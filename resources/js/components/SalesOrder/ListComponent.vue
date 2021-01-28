<template>
  <div class="container">
      <div class="row">
        <h2>Sales Order Lists</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">REF</th>
                <th scope="col">Date</th>
                <th scope="col">Sales</th>
                <th scope="col">Amount</th>
                <th scope="col">Channel</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <table-component
                    v-for="salesOrder in solists"
                    :key="salesOrder.REF"
                    :data="salesOrder"
                ></table-component>
            </tbody>
        </table>
        <nav>
            <ul class="pagination pagination-md">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
      </div>
  </div>
</template>

<script>
import TableComponent from "./List/TableComponet";
import ListPaginationComponent from "./List/ListPaginationComponent";

export default {
    components:{TableComponent, ListPaginationComponent},
    data(){
        return {
            solists:{}
        }
    },
    created(){
        this.getSalesOrders();
    },
    methods:{
        async getSalesOrders(page)
        {
            let url = page ? `api/salesorders?page=${page}` : "api/salesorders";
            try {
                const response = await axios.get(url);
                this.solists = response.data.data;
            } catch (err) {
                console.error(err.data.data);
            }
        }
    }
}
</script>

<style>

</style>
