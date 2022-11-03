<template>
    <div>
        <div>
            <router-link to="all_category" class="btn btn-outline-primary">All Category</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-2">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                                        <hr>
                                    </div>
                                    <form class="user" @submit.prevent="addCategory">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input type="text" v-model="form.category_name" class="form-control" id="exampleInputFirstName" placeholder="Enter Category Name">
                                                    <small class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Add Category</button>
                                        </div>
                                        <hr>
                                    </form>
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
    name: "AddCategoryComponent",
    created() {
        if(!User.loggedIn()){
            $this.$router.push({name:'login'})
        }
    },

    data(){
        return{
           form:{
               category_name:null
           },
            errors:{}
        }
    },
    methods:{
        addCategory(){
            // alert('helo');
            axios.post('api/category',this.form)
                .then(()=> {
                    this.$router.push({name:'all_category'})
                    Notification.success()
                })
                .catch(error => this.errors = error.response.data.errors)
        }
    }

}
</script>

<style scoped>

</style>
