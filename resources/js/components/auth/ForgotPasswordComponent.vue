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
                                        <h1 class="h4 text-gray-900 mb-4">Password Reset</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Enter Existing Email Address">
                                        </div>

                                        <div class="form-group">
                                            <router-link to="" class="btn btn-primary btn-block">Reset Password</router-link>
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <router-link to="/" class="font-weight-bold small">Back to LogIn</router-link>
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
export default {
    name: "ForgotPasswordComponent"
}
</script>

<style scoped>

</style>
