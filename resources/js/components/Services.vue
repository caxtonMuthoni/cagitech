<template>
  <div class="container-fluid mt-2 p-3">
    <a
      href=""
      class="btn btn-success float-right mb-3"
      @click.prevent="showModal(false)"
    >
      <i class="fas fa-plus"></i> Add service</a
    >
    <table class="table table-striped table-bordered">
      <thead>
        <th>#</th>
        <th>Icon</th>
        <th>Service</th>
        <th>Description</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <tr v-for="(service, index) in services" :key="index">
          <td>{{ index + 1 }}</td>
          <td>
            <i class="tech__icon" :class="service.icon"></i>
          </td>
          <td class="td__name">{{ service.service }}</td>
          <td>
            {{ service.description }}
          </td>
          <td>
            <a
              href=""
              @click.prevent="showModal(true, service)"
              class="btn btn-primary"
              ><i class="fas fa-edit"></i
            ></a>
          </td>
          <td>
            <a
              href=""
              @click.prevent="deleteService(service.id)"
              class="btn btn-danger"
              ><i class="fas fa-trash"></i
            ></a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modal-add-service"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-if="isUpdating" class="modal-title">
              <i class="fas fa-edit blue mr-2"></i> Update Service
            </h5>

            <h5 v-else class="modal-title">
              <i class="fas fa-plus blue mr-2"></i> Create new Service
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form
            @submit.prevent="isUpdating ? updateService() : createNewService()"
          >
            <div class="modal-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    >Service</span
                  >
                </div>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.service"
                  placeholder="Service"
                  aria-describedby="inputGroupPrepend1"
                  required
                  :class="{ 'is-invalid': form.errors.has('service') }"
                  name="service"
                />
                <has-error :form="form" field="service"></has-error>
              </div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"
                    >Icon</span
                  >
                </div>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.icon"
                  placeholder="Service Icon"
                  aria-describedby="inputGroupPrepend2"
                  required
                   :class="{ 'is-invalid': form.errors.has('icon') }"
                  name="icon"
                />

                <has-error :form="form" field="icon"></has-error>

              </div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    >Description</span
                  >
                </div>
                <textarea
                  class="form-control"
                  placeholder="Service Description"
                  rows="5"
                  v-model="form.description"
                  required
                  :class="{ 'is-invalid': form.errors.has('description') }"
                  name="description"
                ></textarea>
                <has-error :form="form" field="description"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button v-if="isUpdating" type="submit" class="btn btn-primary">
                Update
              </button>
              <button v-else type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Form } from "vform";

export default {
  data() {
    return {
      services: [],
      isUpdating: false,
      form: new Form({
        id: null,
        service: null,
        icon: null,
        description: null,
      }),
    };
  },

  mounted() {
    this.getServices();
  },

  methods: {
    createNewService() {
      this.$Progress.start()
      this.form
        .post("/api/add/service")
        .then((response) => {
          if (response.data.status) {
            this.getServices();
            this.$Progress.finish()
            this.$swal.fire(
              "Services Added !",
              "The service has been added successfully.",
              "success"
            );
            this.closeModal();
          } else {
            this.$swal.fire("Ooops!", response.data.message, "error");
            this.$Progress.fail()
          }
        })
        .catch((error) => {
          this.$swal.fire("Ooops!", error.message, "error");
          this.$Progress.fail()
        });
    },

    updateService() {
      this.$Progress.start()
      this.form
        .post(`/api/update/service/${this.form.id}`)
        .then((response) => {
          if (response.data.status) {
            this.getServices();
            this.$Progress.finish()
            this.$swal.fire(
              "Updated !",
              "The service has been updated successfully.",
              "success"
            );
            this.closeModal();
          } else {
            this.$swal.fire("Ooops!", response.data.message, "error");
            this.$Progress.fail()
          }
        })
        .catch((error) => {
          this.$swal.fire("Ooops!", error.message, "error");
          this.$Progress.fail()
        });
    },

    // show modal
    showModal(update = false, service) {
      this.isUpdating = update;
      if (update) {
        console.log(service);
        this.form.id = service.id;
        this.form.service = service.service;
        this.form.icon = service.icon;
        this.form.description = service.description;
      } else {
        this.form.clear();
        this.form.reset();
      }

      $("#modal-add-service").modal("show");
    },

    closeModal() {
      this.form.clear();
      this.form.reset();
      $("#modal-add-service").modal("hide");
    },

    // Get all services
    getServices() {
      this.$Progress.start();
      axios
        .get("/api/get/services")
        .then((response) => {
          this.services = response.data;
          this.$Progress.finish();
        })
        .catch((error) => {
          this.$Progress.fail();
        });
    },

    // Delete service

    deleteService(id) {
      this.$swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios
              .delete(`/api/delete/service/${id}`)
              .then((response) => {
                if (response.data.status) {
                  this.getServices();
                  this.$swal.fire(
                    "Deleted!",
                    "The service has been deleted successfully.",
                    "success"
                  );
                } else {
                  this.$swal.fire("Ooops!", response.data.message, "error");
                }
              })
              .catch((error) => {
                this.$swal.fire("Ooops!", error.message, "error");
              });
          }
        });
    },
  },
};
</script>