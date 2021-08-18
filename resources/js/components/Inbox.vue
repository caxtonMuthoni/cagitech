<template>
  <div class="container-fluid mt-2 p-3">
    <table class="table table-striped table-bordered">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Phone</th>
        <th>Call</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <tr v-for="(message, index) in messages" :key="index">
          <td>{{ index + 1 }}</td>
          <td class="td__name">{{ message.name }}</td>
          <td>{{ message.email }}</td>
          <td>
            {{ message.message }}
          </td>
          <td>
            {{ message.phone }}
          </td>
          <td>
             <a :href="`tel:+254'.${message.phone}`"><i class="fas fa-phone text-success "></i></a>
          </td>
          <td>
            <a @click.prevent="deleteMessage(message.id)" href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: []
    }
  },

  mounted() {
    this.getAllMessages();
  },

  methods: {
     getAllMessages () {
        this.$Progress.start()
        axios.get('/api/get/messages').then(response => {
          this.messages = response.data
          this.$Progress.finish()
        }).catch((error) => {
          this.$Progress.fail()
        })
     },

// Delete message
     deleteMessage(id) {
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
              .delete(`/api/delete/message/${id}`)
              .then((response) => {
                if (response.data.status) {
                  this.getAllMessages()
                  this.$swal.fire(
                    "Deleted!",
                    "The message has been deleted successfully.",
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
     }
  }


};
</script>