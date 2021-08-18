<template>
  <div class="container-fluid mt-2 p-3">
    <a
      href=""
      class="btn btn-success float-right mb-3"
      @click.prevent="showModal(false)"
    >
      <i class="fas fa-plus"></i> Add Testimony</a
    >
    <table class="table table-striped table-bordered">
      <thead>
        <th>#</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Occupation</th>
        <th>Testmonies</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <tr v-for="(testimony, index) in testimonies" :key="index">
          <td>{{ index + 1 }}</td>
          <td>
            <img
              :src="`resources/imgs/${testimony.avatar}`"
              alt=""
              class="table__avatar"
            />
          </td>
          <td class="td__name">{{ testimony.name }}</td>
          <td class="td__name">{{ testimony.occupation }}</td>
          <td>
            {{ testimony.testimony }}
          </td>
          <td>
            <a
              @click.prevent="showModal(true, testimony)"
              href=""
              class="btn btn-primary"
              ><i class="fas fa-edit"></i
            ></a>
          </td>
          <td>
            <a @click.prevent="deleteTestimony(testimony.id)" href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modal-add-test"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-if="isUpdating" class="modal-title">
              <i class="fas fa-plus blue mr-2"></i> Updating Testimony
            </h5>
            <h5 v-else class="modal-title">
              <i class="fas fa-plus blue mr-2"></i> Create new Testimony
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
          <form @submit.prevent="isUpdating ? updateTestimony() : createTestimony()">
            <div class="modal-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    ><i class="fas fa-user teal"></i
                  ></span>
                </div>
                <input
                  v-model="form.name"
                  type="text"
                  class="form-control"
                  id="validationServerUsername"
                  placeholder="Fullname"
                  aria-describedby="inputGroupPrepend1"
                  required
                  :class="{ 'is-invalid': form.errors.has('name') }"
                  name="name"
                />

                <has-error :form="form" field="name"></has-error>
              </div>

              <div class="form-check mt-3" v-if="isUpdating">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="exampleCheck1"
                  v-model="updateLogo"
                />
                <label class="form-check-label" for="exampleCheck1"
                  >Do you want to update testimony avatar ?</label
                >
              </div>

              <div class="input-group mt-3" v-if="!isUpdating || updateLogo">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"
                    ><i class="fas fa-image purple"></i
                  ></span>
                </div>
                <input
                  @change="getUploadAvatar"
                  type="file"
                  class="form-control"
                  aria-describedby="inputGroupPrepend2"
                  required
                  :class="{ 'is-invalid': form.errors.has('avatar') }"
                  name="avatar"
                />

                <has-error :form="form" field="avatar"></has-error>
              </div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"
                    ><i class="fas fa-wine-bottle green"></i
                  ></span>
                </div>
                <input
                  v-model="form.occupation"
                  type="text"
                  class="form-control"
                  placeholder="Occupation"
                  aria-describedby="inputGroupPrepend2"
                  required
                  :class="{ 'is-invalid': form.errors.has('occupation') }"
                  name="occupation"
                />

                <has-error :form="form" field="occupation"></has-error>
              </div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    ><i class="fab fa-galactic-senate blue"></i
                  ></span>
                </div>
                <textarea
                  v-model="form.testimony"
                  class="form-control"
                  placeholder="Testimony"
                  rows="5"
                  required
                  :class="{ 'is-invalid': form.errors.has('testimony') }"
                  name="testimony"
                ></textarea>

                <has-error :form="form" field="testimony"></has-error>
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
      testimonies: {},
      isUpdating: false,
      updateLogo: false,
      form: new Form({
        id: null,
        name: null,
        occupation: null,
        testimony: null,
        avatar: null,
      }),
    };
  },

  mounted() {
    this.getAllTestimonies();
  },

  methods: {
    // Create Testmonie
    createTestimony() {
      this.$Progress.start();
      const vm = this
      this.form
        .submit('post', "/api/add/testimony", {
          transformRequest: [
            function (data, headers) {
              return vm.getFormData(data)
            }
          ]
        })
        .then((response) => {
          if (response.data.status) {
            this.$Progress.finish();
            this.getAllTestimonies();
            this.$swal.fire(
              "Testimony Added !",
              "The testimony has been added successfully.",
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

    // update testimony
    updateTestimony() {
      if (!this.form.avatar) {
        delete this.form.avatar;
      }
      this.$Progress.start();
      const v = this;
      this.form
        .submit("post", `/api/update/testimony/${this.form.id}`, {
          transformRequest: [
            function (data, headers) {
              return v.getFormData(data);
            },
          ],
        })
        .then((response) => {
          if (response.data.status) {
            this.$Progress.finish()
            this.getAllTestimonies()
            this.$swal.fire(
              "Testimony updated !",
              "The testimony has been updated successfully.",
              "success"
            );
            this.form["avatar"] = null;
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

    // get File handler
    getUploadAvatar(e) {
      this.form.avatar = e.target.files[0];
    },

    // Display the modal
    showModal(update = false, testimony) {
      this.isUpdating = update;

      if (update) {
        this.form.id = testimony.id;
        this.form.name = testimony.name;
        this.form.occupation = testimony.occupation;
        this.form.testimony = testimony.testimony;
      } else {
        this.form.clear();
        this.form.reset();
      }

      $("#modal-add-test").modal("show");
    },

    // Hide the modal
    hideModal() {
      this.form.clear();
      this.form.reset();
      $("#modal-add-test").modal("hide");
    },

     // Delete technology

    deleteTestimony(id) {
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
              .delete(`/api/delete/testimony/${id}`)
              .then((response) => {
                if (response.data.status) {
                  this.getAllTestimonies()
                  this.$swal.fire(
                    "Deleted!",
                    "The testimony has been deleted successfully.",
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

    // Get the testmonies
    getAllTestimonies() {
      this.$Progress.start();
      axios
        .get(`/api/get/testimonies`)
        .then((response) => {
          this.testimonies = response.data;
          this.$Progress.finish();
        })
        .catch((errror) => {
          this.$Progress.fail();
        });
    },
  },
};
</script>