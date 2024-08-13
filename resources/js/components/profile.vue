<template>
  <v-app>
    <div class="content-wrapper">
      <div v-if="is('Super Admin') || can('profile')">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">{{ $t("message.UPDATE_PROFILE") }}</h1>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      {{ $t("message.UPDATE_PROFILE") }}
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <form @submit.prevent>
                    <input type="hidden" name="_token" :value="csrf" />
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-8">
                          <div
                            class="form-group"
                          >
                          <!-- Name -->
                            <label
                              >{{ $t("message.NAME")
                              }}<span class="required-star">*</span></label
                            >
                            <input
                              v-model="form.name"
                              v-bind:placeholder="$t('message.NAME')"
                              type="text"
                              name="name"
                              class="form-control"
                              :class="{ 'is-invalid': form.errors.has('name') }"
                            />
                            <div
                              class="error-message"
                              v-if="form.errors.has('name')"
                              v-html="form.errors.get('name')"
                            />
                          </div>

                          <!-- Email -->
                          <div class="form-group">
                            <label
                              >{{ $t("message.EMAIL")
                              }}<span class="required-star">*</span></label
                            >
                            <input
                              v-model="form.email"
                              v-bind:placeholder="$t('message.EMAIL')"
                              type="email"
                              name="email"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('email'),
                              }"
                            />
                            <div
                              class="error-message"
                              v-if="form.errors.has('email')"
                              v-html="form.errors.get('email')"
                            />
                          </div>

                          <!-- Password -->
                          <div class="form-group">
                            <label
                              >{{ $t("message.PASSWORD")
                              }}<span class="required-star">*</span></label
                            >
                            <input
                              v-model="form.password"
                              v-bind:placeholder="$t('message.PASSWORD')"
                              type="password"
                              name="password"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('password'),
                              }"
                            />
                            <div
                              class="error-message"
                              v-if="form.errors.has('password')"
                              v-html="form.errors.get('password')"
                            />
                          </div>

                        </div>
                        <div class="col-md-4">
                          <div class="form-group text-center">
                            <label>{{ $t("message.PHOTO") }}</label>
                            <br />
                            <br />
                            <span
                              ><img
                                v-bind:src="'images/users/' + profiles.photo"
                                width="60%"
                                alt="Banner not found"
                            /></span>
                            <br />
                            <br />
                            <input
                              @change="addPhoto"
                              type="file"
                              name="photo"
                              class="form-control"
                              :class="{
                                'is-invalid': form.errors.has('photo'),
                              }"
                            />
                            <div
                              class="error-message"
                              v-if="form.errors.has('photo')"
                              v-html="form.errors.get('photo')"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button
                        @click.prevent="updateProfile"
                        type="submit"
                        class="btn btn-primary"
                      >
                        {{ $t("message.UPDATE_PROFILE") }}
                      </button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <div class="unathorized-text" v-else>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 unauthorized">
              <v-alert color="red lighten-2" dark>
                {{ $t("message.UNAUTHORIZED") }}
              </v-alert>
            </div>
          </div>
        </div>
      </div>
    </div>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      loading: true,
      cities: [],
      profiles: [],
       // Create a new form instance
      form: new form({
        id: "",
        name: "",
        username: "",
        email: "",
        password: "",
        photo: "",
      }),
    };
  },
  methods: {

    // get profile data
    getResults() {
      if (this.is("Super Admin") || this.can("profile")) {

        // get the profile data
        axios.get("api/profiles").then((response) => {
          this.$Progress.start();
          this.loading = true;
          this.profiles = response.data;
          var form = this.form;
          form.fill(this.profiles);
          this.$Progress.finish();
          this.loading = false;
        });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },

    // update user prpfile
    updateProfile() {
      if (this.is("Super Admin") || this.can("profile")) {
        this.$Progress.start();
        this.form
          .put("api/profiles/" + this.form.id)
          .then(() => {
            Fire.$emit("reloadUser");
            toast.fire({
              icon: "success",
              title: this.$t("message.EDIT_MESSAGE_SUCCESS"),
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
            toast.fire({
              icon: "warning",
              title: this.$t("message.EDIT_MESSAGE_ERROR"),
            });
          });
      } else {
        toast.fire({
          icon: "error",
          title: this.$t("message.UNAUTHORIZED"),
        });
        this.$Progress.fail();
        this.loading = false;
      }
    },
    
    addPhoto(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = () => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
  },
  mounted() {
    this.getResults();
    Fire.$on("reloadUser", () => {
      this.getResults();
    });
  },
};
</script>