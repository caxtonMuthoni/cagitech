<template>
  <div class="container-fluid mt-2 p-3">
    <a
      href=""
      class="btn btn-success float-right mb-3"
      @click.prevent="showModal(false)"
    >
      <i class="fas fa-plus"></i> Add Tech</a
    >
    <table class="table table-striped table-bordered">
      <thead>
        <th>#</th>
        <th>Icon</th>
        <th>Name</th>
        <th>Category</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <tr v-for="(technology, index) in technologies" :key="index">
          <td>{{ index + 1 }}</td>
          <td>
            <img
              :src="`resources/imgs/${technology.icon}`"
              alt=""
              class="table__icon"
            />
          </td>
          <td>{{ technology.technology }}</td>
          <td>{{ technology.category }}</td>
          <td>
            <a
              @click.prevent="showModal(true, technology)"
              href=""
              class="btn btn-primary"
              ><i class="fas fa-edit"></i
            ></a>
          </td>
          <td>
            <a @click.prevent="deleteTechnology(technology.id)" href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modal-add-tech"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-if="isUpdating" class="modal-title">
              <i class="fas fa-edit blue mr-2"></i> Updating Technology
            </h5>
            <h5 v-else class="modal-title">
              <i class="fas fa-plus blue mr-2"></i> Create new Technology
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
            @submit.prevent="
              isUpdating ? updateTechnology() : createNewTechnology()
            "
          >
            <div class="modal-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    >Tech</span
                  >
                </div>
                <input
                  v-model="form.technology"
                  type="text"
                  class="form-control"
                  placeholder="Technology"
                  aria-describedby="inputGroupPrepend1"
                  required
                :class="{ 'is-invalid': form.errors.has('technology') }"
                  name="technology"
                />

                <has-error :form="form" field="technology"></has-error>
              </div>

              <div class="form-check mt-3" v-if="isUpdating">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="exampleCheck1"
                  v-model="updateLogo"
                />
                <label class="form-check-label" for="exampleCheck1"
                  >Do you want to update tech logo ?</label
                >
              </div>

              <div class="input-group mt-3" v-if="!isUpdating || updateLogo">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"
                    >Icon</span
                  >
                </div>
                <input
                  type="file"
                  @change="getInputFile"
                  class="form-control"
                  placeholder="Technology Icon"
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
                    >Category</span
                  >
                </div>
                <input
                  v-model="form.category"
                  type="text"
                  class="form-control"
                  placeholder="Technology Category"
                  aria-describedby="inputGroupPrepend1"
                  required
                :class="{ 'is-invalid': form.errors.has('category') }"
                  name="category"
                />

                <has-error :form="form" field="category"></has-error>
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
      technologies: {},
      isUpdating: false,
      updateLogo: false,
      form: new Form({
        id: null,
        icon: null,
        technology: null,
        category: null,
      }),
    };
  },

  mounted() {
    this.getAllTechnologies();
  },

  methods: {
    //  Creating new technology
    createNewTechnology() {
      this.$Progress.start();
      const v = this;
      this.form
        .submit("post", "/api/add/technology", {
          transformRequest: [
            function (data, headers) {
              return v.getFormData(data);
            },
          ],
        })
        .then((response) => {
          if (response.data.status) {
            this.$Progress.finish();
            this.getAllTechnologies();
            this.$swal.fire(
              "Technology Added !",
              "The technoloy has been added successfully.",
              "success"
            );
            this.hideModal();
          } else {
            this.$swal.fire("Ooops!", response.data.message, "error");
            this.$Progress.fail();
          }
        })
        .catch((error) => {
          this.$swal.fire("Ooops!", error.message, "error");
          this.$Progress.fail();
        });
    },

    // Technology updating
    updateTechnology() {
      if (!this.form.icon) {
        delete this.form.icon;
      }
      this.$Progress.start();
      const v = this;
      this.form
        .submit("post", `/api/update/technology/${this.form.id}`, {
          transformRequest: [
            function (data, headers) {
              return v.getFormData(data);
            },
          ],
        })
        .then((response) => {
          if (response.data.status) {
            this.$Progress.finish();
            this.getAllTechnologies();
            this.$swal.fire(
              "Technology updated !",
              "The technology has been updated successfully.",
              "success"
            );
            this.form["icon"] = null;
            this.hideModal();
          } else {
            this.$swal.fire("Ooops!", response.data.message, "error");
            this.$Progress.fail();
          }
        })
        .catch((error) => {
          this.$swal.fire("Ooops!", error.message, "error");
          this.$Progress.fail();
        });
    },

    // Preparing form data

    getFormData(object) {
      const formData = new FormData();
      Object.keys(object).forEach((key) => formData.append(key, object[key]));
      return formData;
    },

    // File input handler
    getInputFile(e) {
      this.form.icon = e.target.files[0];
      console.log(e.target.files[0]);
    },

    // Show modal

    showModal(update = false, technology) {
      this.isUpdating = update;
      if (update) {
        this.form.id = technology.id;
        this.form.technology = technology.technology;
        this.form.category = technology.category;
      } else {
        this.form.clear();
        this.form.reset();
      }

      $("#modal-add-tech").modal("show");
    },

    // Hide modal
    hideModal() {
      this.form.clear();
      this.form.reset();
      $("#modal-add-tech").modal("hide");
    },

    // Get all technologies.

    getAllTechnologies() {
      this.$Progress.start();
      axios
        .get("/api/get/technologies")
        .then((response) => {
          this.technologies = response.data;
          this.$Progress.finish();
        })
        .catch((error) => {
          this.$Progress.fail();
        });
    },

    // Delete technology

    deleteTechnology(id) {
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
              .delete(`/api/delete/technology/${id}`)
              .then((response) => {
                if (response.data.status) {
                  this.getAllTechnologies();
                  this.$swal.fire(
                    "Deleted!",
                    "The technology has been deleted successfully.",
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