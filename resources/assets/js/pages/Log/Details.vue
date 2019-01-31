<template>
	<layout>
		<section class="main-content">
			<div class="card">
				<div class="card-header">
                    <div class="row">
                        <div class="col-md-7">ID: {{ audit_log._id }}</div>
                        <div class="col-md-5 text-right">
                            <button @click="getLogDetails" class="btn btn-primary btn-sm">
                                <i class="icon-sm">
                                    <svg class="fill-white" :class="{spin: loading}">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#zondicon-refresh"></use>
                                    </svg>
                                </i>
                            </button>
                        </div>
                    </div>
                </div>

                <loader :yes="loading"/>

                <div v-if="! loading" class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-2"><strong>Subject type</strong></div>
                        <div class="col">{{ audit_log.subject_type }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Causer type</strong></div>
                        <div class="col">{{ audit_log.causer_type }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Properties</strong></div>
                        <div class="col">{{ audit_log.properties }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Description</strong></div>
                        <div class="col">{{ audit_log.description }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Log name</strong></div>
                        <div class="col">{{ audit_log.log_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Request info</strong></div>
                        <div class="col">{{ audit_log.request_infos }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Created at</strong></div>
                        <div class="col">{{ audit_log.created_at }}</div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-2"><strong>Data</strong></div>
                        <div class="col">
                            <p class="jobDetailsText" v-html="prettyPrintData(audit_log)"></p>
                        </div>
                    </div>
                </div>

			</div>
		</section>
	</layout>
</template>

<script>
	import Layout from '../../layouts/MainLayout.vue';

	export default {
		props: ['logId'],
		data() {
            return {
                audit_log: [],
                loading: true,
            };
        },
		components: {
			Layout
		},
		created() {
			this.getLogDetails();
		},
		methods: {
			getLogDetails() {
                this.loading = true;
				return this.$http.get('/viewdit/api/audit_log/'+this.logId)
                    .then(response => {
                        this.audit_log = response.data.audit_log;
                        this.loading = false;
                    });
			},
			prettyPrintData(data) {
				return "<pre>" + JSON.stringify(data, undefined, 2) + "</pre>";
            }
		}
	}
</script>