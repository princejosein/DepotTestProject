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
        <b-row v-if="totalItems>0">
            <b-col md="6" class="my-1">
                <b-pagination
                @change="onPageChanged"
                :total-rows="totalItems"
                :per-page="perPage"
                v-model="currentPage"
                class="my-0"
                />
            </b-col>
        </b-row>
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
            solists:{},
            totalItems:0,
            perPage:10,
            currentPage:1
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
                this.totalItems = response.data.total;
                this.perPage = response.data.per_page;
            } catch (err) {
                console.error(err.data.data);
            }
        },
        onPageChanged(page) {
            this.getSalesOrders(page)
        }
    },
}
</script>

<style>

</style>
