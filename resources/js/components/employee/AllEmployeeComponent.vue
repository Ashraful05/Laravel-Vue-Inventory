<template>
    <div>
        <div>
            <router-link to="add_employee" class="btn btn-outline-primary">Add Employee</router-link>
        </div>
        <input type="text" v-model="searchTerm" class="form-control mt-2" style="width:300px;" placeholder="Search here......">
        <div class="row mt-3">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Phone</th>
                                <th>Salary</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in filtersearch" :key="employee.id">
                                <td>{{ employee.name }}</td>
                                <td>
                                    <img :src="employee.photo" alt="" id="employeePhoto">
                                </td>
                                <td>{{ employee.phone }}</td>
                                <td>{{ employee.salary }}</td>
                                <td>{{ employee.joining_date }}</td>
                                <td>
                                    <router-link to="" class="btn btn-sm btn-primary">Edit</router-link>
                                    <router-link to="" class="btn btn-sm btn-danger">Delete</router-link>
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
export default {
    name: "AllEmployeeComponent",
    created(){
        if(!User.loggedIn()){
            $this.$router.push({name:'/'})
        }
    },
    data(){
        return{
            employees:[],
            searchTerm:''
        }
    },
    computed:{
        filtersearch(){
            return this.employees.filter(employee => {
                return employee.name.match(this.searchTerm)
            })
        }
    },
    methods:{
        allEmployee(){
           axios.get('api/employee')
               .then( ({data}) => (this.employees = data) )
               .catch()
        }
    },
    created(){
        this.allEmployee();
    }
}
</script>

<style scoped>

#employeePhoto{
    height:40px;
    width:40px;
}

</style>
