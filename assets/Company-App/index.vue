<template>

    <div class="container">
        <div class="row">
            <h1>Hallo Company</h1>
        </div>
    </div>

</template>

<script>

    export default {
        name: 'Company-App-Index',
        data: function () {
            return {
                companies: [],
            };
        },
        mounted() {
            this.$store.dispatch('loadCompanies').then(companies => {
                console.log(companies);
                this.companies = companies;
            });
        }
    };

</script> 