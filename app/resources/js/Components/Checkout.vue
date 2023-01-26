<template>
    <v-card>
        <template>
            <div v-if="pay">
                 <v-card-title>
                    Bezahlen
                </v-card-title>
                <v-card-text>
                    <div v-if="timer">
                        <v-progress-circular size="40" indeterminate />

                        <span>
                            Vorgang abgeschlossen, Fenster schließt sich in {{timer}} Sekunden
                        </span>
                    </div>
                    <div v-else>
                        <h2>
                            {{getPrice()}} €
                        </h2>

                        <v-btn  :loading="submitting" @click="submit()">
                            Ticket Bezahlen
                        </v-btn>

                    </div>
                </v-card-text>
            </div>
            <div v-else>
                <v-card-title>
                    Ausfahrt
                </v-card-title>
                <v-card-text>
                    <div>
                        <span>Ihr Aufenthalt wird später abgerechnet</span>
                    </div>
                    <div v-if="timer">
                        <v-progress-circular size="40" indeterminate />

                        <span>
                            Vorgang abgeschlossen, Fenster schließt sich in {{timer}} Sekunden
                        </span>
                    </div>
                </v-card-text>
            </div>
        </template>
    </v-card>
</template>

<script>
export default {
    props: {
        license_plate: {
            required: true,
            type: String
        },
        pay:{
            required: true,
            type: Boolean
        }
    },
    data: function(){
        return {
            submitting: false,
            timer: null,
        }
    },
    mounted () {
        if(!this.pay){
            this.submit()
        }
    },
    methods: {
        submit(){
            this.submitting = true
            axios.delete(this.route('api.ticket.delete', this.license_plate)).then(response => {
                this.submitting = false
                this.closeCheckout()
            })
        },
        getPrice(){
            return (Math.random() * (20.00 - 5.00) + 5.00).toFixed(2)
        },
        closeCheckout(){
            this.timer = 5
            const x = setInterval(() => {
                this.timer--;

                if(this.timer == 0){
                    clearInterval(x)
                    this.$emit('close');
                }
            }, 1000)

        }
    }
}
</script>

<style>

</style>
