<template>
    <tr>
        <th scope="row">{{data.REF}}</th>
        <td>{{data.Date}}</td>
        <td>{{data.Sales}}</td>
        <td>{{data.Amount}}</td>
        <td>{{data.Channel}}</td>
        <td class="text-center"><router-link :to="{ name: 'details', params: { id: data.REF }}"><button class="btn btn-custom">Details</button></router-link></td>
    </tr>
</template>

<script>
export default {
    props: ["data"],
}
</script>

<style>

</style>
