<template>    
    <div class="container">
        <div class="row">
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Produkte</th>
                    <th scope="col">Aktionen</th>
                </tr>
            </thead>
            
            <tbody>
                <template v-for="company in companies" :key="company.id">
                    <CompanyTableRow :company="company"></CompanyTableRow>
                </template>
            </tbody>
        </table>                
        </div>
    </div>
</template>

<script>
    import CompanyTableRow from './CompanyTableRow';

    export default {
        name: 'CompanyTableView',
        props: {
            companies: {
                type: Array,
                required: true,
            },
        },
        components: {
            CompanyTableRow,
        },
    }
</script>

<style>

</style>