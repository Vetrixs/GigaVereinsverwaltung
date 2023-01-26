<template>
    <v-card>
        <v-card-title>
            Parkschein Ziehen
        </v-card-title>
        <v-card-text>
            <v-text-field label="Kennzeichen" v-model="form.license_plate" />
            <v-btn :disabled="form.license_plate.length <= 0" :loading="submitting" @click="submit">
                Ticket lösen
            </v-btn>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data: function() {
        return {
            form: this.$inertia.form({
                license_plate: ''
            }),
            submitting: false
        }
    },
    methods: {
        submit(){
            this.submitting = true;
            this.form.post(this.route('ticket.store'), {
                onSuccess: () => {
                    this.submitting = false
                    this.form.reset()
                }
            })
        }
    }
}
</script>

<style>

</style>
