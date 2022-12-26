<template>    
    <tr>
        <th scope="row">{{ company.id }}</th>
            <td>{{ company.name }}</td>
            <td>
                <ul class="list-group list-group-flush">
                    <company-table-view-product v-for="product in company.products" :key="product.id" :product="product"></company-table-view-product>
                </ul>                
            </td>
            <td><a :href="getLink()">Produkt anlegen</a></td>
    </tr>
</template>

<script>

import CompanyTableViewProduct from './CompanyTableViewProduct';

export default {
    name: "CompanyTableRow",
    props: {
        company: {
            type: Object,
            required: true,
        },
    },
    methods: {
        getLink() {
            return "/admin/product/add/" + this.company.id;
        },
    },
    components: { CompanyTableViewProduct }
}
</script>

<style>

</style>