<template>
<div>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user" @submit.prevent="login">
                                    <div class="form-group">
                                        <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address">
                                        <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                        <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <router-link to="/register" class="font-weight-bold small" >Create an Account!</router-link>
                                </div>
                                <div class="text-center">
                                    <router-link to="/forgot-password" class="font-weight-bold small">Forgot Password</router-link>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import User from "../../Helpers/User";

export default {
    // name: "LoginComponent",
    created() {
      if(User.loggedIn()){
          this.$router.push({name: 'home'})
      }
    },
    data(){
        return{
            form:{
                email:null,
                password:null,
            },
            errors:{}
        }
    },
    methods:{
        // login(){
        //     // alert('done');
        //     axios.post('/api/auth/login',this.form)
        //         .then(response => console.log(response.data))
        //         .catch(error => console.log(error.response.data))
        // },
        login(){
            axios.post('api/auth/login',this.form)
                .then(response => {
                    this.$router.push({name:'home'})
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                   User.responseAfterLogin(response)
                })
                .catch(error =>
                    this.errors = error.response.data.errors,
                    Toast.fire({
                        icon:'warning',
                        title: "Invalid email or password!"
                    })
                );

        }
    }
}
</script>

<style scoped>

</style>
