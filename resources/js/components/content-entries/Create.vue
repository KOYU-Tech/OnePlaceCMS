<template>
    <div>
        <form @submit.prevent="saveModel">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Entry</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="title-field">Title</label>
                                <input v-model="fields.title" id="title-field" class="form-control"
                                       :class="errors && errors.title ? 'is-invalid' : ''">
                                <div v-if="errors && errors.title" class="invalid-feedback">{{ errors.title[0] }}</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <publish-toggle :is-published="fields.published" @onChangePublished="onChangePublished"></publish-toggle>
                        </div>
                    </div>

                    <div class="form-group" v-for="field in modelFields">
                        <label :for="field.api_id">{{ field.name }}</label>
                        <input :id="field.api_id" class="form-control"
                               v-model="fields.fields[field.api_id]"
                               :class="errors && errors[field.api_id] ? 'is-invalid' : ''">
                        <div v-if="errors && errors[field.api_id]" class="invalid-feedback">{{ errors[field.api_id][0] }}</div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <input class="btn btn-success" name="save" type="submit" value="Save">
                        <router-link to="/model" class="btn btn-default">Close</router-link>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
        </form>
    </div>
</template>

<script>
    import FunctionsMixin from '../../mixins/CreateAndUpdateEntry';

    export default {
        name: "Create",
        mixins: [FunctionsMixin],
        methods: {
            saveModel() {
                axios.post('/api/content-entry', this.fields).then(response => {
                    this.$store.commit('updateErrorMessage', []);
                    this.$store.commit('updateSuccessMessage', this.fields.title + " was created");
                    this.errors = [];
                    this.fields = {};

                    // this.$router.push(`/model/edit/${response.data._id}`);

                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                        this.$store.commit('updateSuccessMessage', "");
                        this.$store.commit('updateErrorMessage', ["Entry wasn't created"]);
                    } else {
                        this.errors = [];
                        this.$store.commit('updateSuccessMessage', "");
                        this.$store.commit('updateErrorMessage', ["Error occurred while saving new entry"]);
                    }
                });
            }
        },
        created() {
            this.getFieldsFromModel();
            this.$store.commit('updateTitlePage', 'Create entry');
        }
    }
</script>

<style lang="scss">

</style>