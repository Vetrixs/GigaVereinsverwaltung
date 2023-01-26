<template>
    <v-card>
        <v-card-title>
            Parkschein Lösen
        </v-card-title>
        <v-card-text>
            <v-text-field :error-messages="error ? error : ''" label="Kennzeichen" v-model="license_plate" />
            <v-btn :disabled="license_plate.length <= 0" :loading="submitting" @click="submit()">
                 Ticket Einlesen
            </v-btn>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data: function(){
        return {
            license_plate: '',
            submitting: false,
            error: false
        }
    },
    methods: {
        submit(){
            this.submitting = true;
            axios.get(this.route('api.ticket.is.parking', this.license_plate)).then(response => {
                this.submitting = false
                if(response.data.open_ticket){
                    this.$emit('open-ticket', response.data.pay, this.license_plate)
                }else{
                    this.error = 'Kennzeichen wurde nicht gefunden'
                }
            })
        }
    }
}
</script>

<style>

</style>
