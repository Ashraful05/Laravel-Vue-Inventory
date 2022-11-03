<template>
    <div>
        <div>
            <router-link to="add_category" class="btn btn-outline-primary">Add Category</router-link>
        </div>
        <input type="text" v-model="searchTerm" class="form-control mt-2" style="width:300px;" placeholder="Search here......">
        <div class="row mt-3">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in filtersearch" :key="category.id">
                                <td>{{ category.category_name }}</td>
                                <td>
                                    <router-link :to="{name: 'edit_category',params:{id:category.id}}" class="btn btn-sm btn-primary mb-auto">Edit</router-link>
                                    <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    name: "AllCategoryComponent",
    created() {
        if(!User.loggedIn()){
            this.$router.push({path:'/'})
        }
    },
    data(){
        return{
            categories:[],
            searchTerm:''
        }
   },
    computed:{
      filtersearch(){
          return this.categories.filter(category => {
              return category.category_name.match(this.searchTerm)
          })
      }
    },
    methods:{
        allCategory(){
          axios.get('api/category')
              .then( ({data}) => (this.categories = data) )
              .catch()
        },
        deleteCategory(id){
            Swal.fire({
                title: 'Are you sure to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/category/'+id)
                        .then( () => {
                            this.categories = this.categories.filter(category => {
                                return category.id !== id
                            })
                        })
                        .catch( ()=>{
                            this.$router.push({name:'all_category'})
                        } )
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
    },
    created() {
        this.allCategory();
    }

}
</script>

<style scoped>

</style>
