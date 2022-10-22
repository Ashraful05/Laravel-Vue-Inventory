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
                                    </div>
                                    <div class="form-group">
                                        <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword" placeholder="Password">
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
            }
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
                   User.responseAfterLogin(response)
                   this.$router.push({name:'home'})
                })
                .catch();

        }
    }
}
</script>

<style scoped>

</style>
