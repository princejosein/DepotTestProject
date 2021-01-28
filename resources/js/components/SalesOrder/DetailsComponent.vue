<template>
<div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm">
                 <h2>Saled Order Details - {{salesOrderId}}</h2>
            </div>
            <div class="col-sm text-right">
              <button class="btn btn-primary btn-lg" @click="back()">Back</button>
            </div>
        </div>
        <div v-if="Object.keys(salesOrderDetails).length">
        <div class="row mb-4">
            <div class="col-sm">
                <button class="btn btn-primary btn-lg">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg> REF : {{salesOrderId}}
                </button>

            </div>

            <div class="col-sm text-right">
                <button class="btn btn-primary btn-lg">
 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
</svg>  {{salesOrderDetails.Date}}
                </button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm">
                <button class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg> Sales : {{salesOrderDetails.Sales}}
                </button>
            </div>
            <div class="col-sm text-right">
              <button class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg> Amount : ${{salesOrderDetails.Amount}}
                </button>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm">
                <button class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
  <path d="M8 0l1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
  <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
</svg>  Channel : {{salesOrderDetails.Channel}}
                </button>
            </div>
        </div>

        <div class="row">
            <h4 class="w-100">Sales Order Items</h4>
            <ul class="list-group w-100" v-for="soline in salesOrderDetails.SOLines" :key="soline.SKU">
                <li class="list-group-item" aria-current="true">
                    <p>SKU: <b>{{soline.SKU}}</b></p>
                    <p>DESC:<b>{{desc(soline.Desc)}}</b></p>
                    <p>Qty:<b>{{soline.Qty}}</b></p>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>

</template>

<script>

export default {
    data(){
        return {
            salesOrderId: this.$route.params.id,
            salesOrderDetails:{}        }
    },
    created(){
       this.getSalesOrderDetails();
    },
    computed:{

    },
    methods:{
        back(){
            this.$router.go(-1);
        },
        async getSalesOrderDetails()
        {
            let url = `api/salesorder/` + this.salesOrderId ;
            try {
                const response = await axios.get(url);
                console.log(response.data)
                this.salesOrderDetails = response.data[0];
            } catch (err) {
                console.error(err.data.data);
            }
        },
        desc: function(descString)
        {
            return descString.substring(0,19);
        }
    }
}
</script>

<style>

</style>
