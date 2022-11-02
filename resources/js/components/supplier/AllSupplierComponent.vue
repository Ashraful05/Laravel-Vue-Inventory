<template>
    <div>
        <div>
            <router-link to="add_supplier" class="btn btn-outline-primary">Add Supplier</router-link>
        </div>
        <input type="text" v-model="searchTerm" class="form-control mt-2" style="width:300px;" placeholder="Search here......">
        <div class="row mt-3">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Supplier List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Shop Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="supplier in filtersearch" :key="supplier.id">
                                <td>{{ supplier.name }}</td>
                                <td>
                                    <img :src="supplier.photo" alt="" id="supplierPhoto">
                                </td>
                                <td>{{ supplier.phone }}</td>
                                <td>{{ supplier.address }}</td>
                                <td>{{ supplier.shop_name }}</td>
                                <td>{{ supplier.email }}</td>
                                <td>
                                    <router-link :to="{name: 'edit_supplier',params:{id:supplier.id}}" class="btn btn-sm btn-primary mb-auto">Edit</router-link>
                                    <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
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
    name: "AllSupplierComponent",
    created(){
        if(!User.loggedIn()){
            $this.$router.push({name:'/'})
        }
    },
    data(){
        return{
            suppliers:[],
            searchTerm:''
        }
    },
    computed:{
        filtersearch(){
            return this.suppliers.filter(supplier => {
                return supplier.name.match(this.searchTerm)
            })
        }
    },
    methods:{
        allSupplier(){
            axios.get('api/supplier')
                .then( ({data}) => (this.suppliers = data) )
                .catch()
        },
        deleteSupplier(id){
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
                    axios.delete('/api/supplier/'+id)
                        .then( () => {
                            this.suppliers = this.suppliers.filter(supplier => {
                                return supplier.id != id
                            })
                        })
                        .catch( ()=>{
                            this.$router.push({name:'all_supplier'})
                        } )
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    },
    created(){
        this.allSupplier();
    }
}
</script>

<style scoped>

#supplierPhoto{
    height:40px;
    width:40px;
}

</style>

