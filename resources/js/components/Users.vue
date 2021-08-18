<template>
  <div class="container-fluid mt-2 p-3">
    <table class="table table-striped table-bordered">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <tr v-for="(user, index) in users" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <a @click.prevent="showModal(user)" href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <a @click.prevent="deleteUser(user.id)" href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div
      class="modal fade"
      id="modal-add-user"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              <i class="fas fa-plus blue mr-2"></i> Update user
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
          <form @submit.prevent="updateUser">
            <div class="modal-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend1"
                    ><i class="fas fa-user blue"></i
                  ></span>
                </div>
                <input
                 v-model="form.name"
                  type="text"
                  class="form-control"
                  id="validationServerUsername"
                  placeholder="Full Name"
                  aria-describedby="inputGroupPrepend1"
                  required
                  :class="{ 'is-invalid': form.errors.has('name') }"
                  name="name"
                />

                <has-error :form="form" field="name"></has-error>
              </div>

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"
                    ><i class="fas fa-envelope pink"></i
                  ></span>
                </div>
                <input
                 v-model="form.email"
                  type="email"
                  class="form-control"
                  placeholder="Email Address"
                  aria-describedby="inputGroupPrepend2"
                  required
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  name="email"
                />

                <has-error :form="form" field="email"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {Form}  from 'vform'
export default {
  data() {
    return {
      users: [],
      form: new Form({
        id: null,
        name: null,
        email: null
      })
    };
  },

  mounted() {
    this.getAllUsers();
  },

  methods: {

    // Update user 
    updateUser() {
      this.$Progress.start()
      this.form.post(`/api/update/user/${this.form.id}`).then((response) => {
      if (response.data.status) {
            this.$Progress.finish();
            this.getAllUsers()
            this.$swal.fire(
              "User updated !",
              "The user has been updated successfully.",
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

    // Delete user
     deleteUser(id){
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
              .delete(`/api/delete/user/${id}`)
              .then((response) => {
                if (response.data.status) {
                  this.getAllUsers()
                  this.$swal.fire(
                    "Deleted!",
                    "The user has been deleted successfully.",
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

    // showModal
    showModal(user) {
      this.form.id = user.id
      this.form.name = user.name
      this.form.email = user.email
      $("#modal-add-user").modal("show");
    },

    // hide modal
    hideModal() {
      $("#modal-add-user").modal("hide");
    },

    // Gett all users
    getAllUsers() {
      this.$Progress.start();
      axios
        .get("/api/get/users")
        .then((response) => {
          this.users = response.data;
          this.$Progress.finish();
        })
        .catch((error) => {
          this.$Progress.fail();
        });
    },
  },
};
</script>