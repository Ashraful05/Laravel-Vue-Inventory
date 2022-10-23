<template>

</template>

<script>
export default {
    name: "LogoutComponent",
    created() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        Toast.fire({
            icon:'success',
            title:'Logged out Successfully!!'
        })
        this.$router.push({name:'login'})
    }
}
</script>

<style scoped>

</style>
