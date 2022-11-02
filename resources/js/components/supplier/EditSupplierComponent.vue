<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-2">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit Supplier</h1>
                                        <hr>
                                    </div>
                                    <form class="user" @submit.prevent="updateSupplier" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName" placeholder="Enter Full Name">
                                                    <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                                           placeholder="Enter Email Address">
                                                    <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" v-model="form.phone" class="form-control" id="" placeholder="Phone number">
                                                    <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <input type="text" v-model="form.shop_name" class="form-control" id="" placeholder="Shop Name">
                                                    <small class="text-danger" v-if="errors.shop_name">{{ errors.shop_name[0] }}</small>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea type="text" class="form-control" v-model="form.address" placeholder="Enter Address"></textarea>
                                                    <small class="text-danger" v-if="errors.address">{{ errors.address[0]}}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-7">
                                                    <input type="file"  class="custom-file-input" id="customFile" @change="onFileSelected">
                                                    <label for="customFile" class="custom-file-label">Choose File</label>
                                                    <small class="text-danger" v-if="errors.photo">{{ errors.photo[0]}}</small>
                                                </div>
                                                <div class="col-md-5">
                                                    <img :src="form.photo" style="height:50px;width:50px;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Update Supplier</button>
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
    created() {
        if(!User.loggedIn()){
            this.$router.push({path:'/'})
        }
    },
    name: "EditSupplierComponent",

    data(){
        return{
            form:{
                name:'',
                email:'',
                phone:'',
                address:'',
                photo:'',
                newphoto:'',
                shop_name:'',
            },
            errors:{

            }
        }
    },
    created(){
      let id = this.$route.params.id
      axios.get('/api/supplier/'+id)
          .then( ({data}) => (this.form = data))
          .catch(console.log('error'))
    },
    methods:{
        onFileSelected(event)
        {
            // alert('hello');
            let file = event.target.files[0];
            if(file.size > 5243850){
                Notification.imageValidation();
            }else{
                // console.log(event);
                let reader = new FileReader();
                reader.onload = event =>{
                    this.form.newphoto = event.target.result
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }

        },
        updateSupplier(){
            // alert('hello');
            let id = this.$route.params.id;
            axios.patch('/api/supplier/'+id, this.form)
                .then(() => {
                    this.$router.push({name:'all_supplier'})
                    // this.$router.push({name:'/all_employee'})
                    Notification.success()
                })
                .catch(error => this.errors = error.response.data.errors)
            // Notification.error()
            // .catch(
            //     Notification.error()
            // )
        }
    }

}
</script>

<style scoped>

</style>
