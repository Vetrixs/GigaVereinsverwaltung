<template>
    <v-container>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title>
                        {{freeParkingSpaces}} Freie Parkplätze
                    </v-card-title>
                </v-card>
            </v-col>
            <v-col>
                <In/>
            </v-col>
            <v-col>
                <Out v-if="!checkout" @open-ticket="openCheckout" />
                <checkout v-else :pay="pay" @close="closeCheckout" :license_plate="license_plate" />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import In from '../../Components/In.vue'
import Out from '../../Components/Out.vue'
import Checkout from '../../Components/Checkout.vue'
export default {
    components: {
        In,
        Out,
        Checkout
    },
    props: {
        freeParkingSpaces: {
            required: true,
            type: Number
        }
    },
    data: function () {
        return {
            pay: false,
            checkout: false,
            license_plate: '',
        }
    },

    methods:{
        openCheckout(pay, license_plate){
            this.pay = pay
            this.license_plate = license_plate
            this.checkout = true
        },
        closeCheckout(){
            this.$inertia.visit(route('ticket.index'),{
                only:this.freeParkingSpaces
            })
        }
    }
}
</script>

<style>

</style>
