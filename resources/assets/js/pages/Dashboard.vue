<template>
	<layout>
		<section class="mainContent">
			<div class="card">
				<div class="card-header d-flex align-items-center">
                    <span class="mr-auto">Audit log history</span>
                    <div class="search">
                    	<date-picker v-model="range" 
						range lang="en" 
						format="YYYY-MM-DD"
						@clear='(clear)=>{range=null}'
						confirm :not-after="new Date()"
						></date-picker>
                        <button class="btn btn-primary btn-md" @click="getRecords()">Find</button>
                    </div>
                </div>

                <div class="table-responsive">
                	<loader :yes="loading"/>

                    <p class="text-center m-0 p-5" v-if="!loading && !audit_activity.length">
                        There aren't any results.
                    </p>

                    <table v-if="! loading && audit_activity.length" class="table card-table table-hover">
                        <thead>
	                        <tr>
	                            <th>Causer type</th>
	                            <th>Subject type</th>
	                            <th>Description</th>
	                            <th>Log</th>
	                            <th>Created at</th>
	                        </tr>
                        </thead>
                        <tbody>
	                        <tr v-for="log in audit_activity">
	                        	<td>
	                                <router-link :to="{ name: 'log.detail', params: { logId: log._id }}" data-toggle="tooltip" :title="log.causer_type">
	                                    {{ log.causer_type }}
	                                </router-link>
	                            </td>
	                            <td>{{ log.subject_type }}</td>
	                            <td>{{ log.description | truncate(25) }}</td>
	                            <td>{{ log.log_name }}</td>
	                            <td>{{ log.created_at }}</td>
	                        </tr>
                        </tbody>
                    </table>
                    <div v-if="! loading && audit_activity.length" class="p-3 mt-3 d-flex justify-content-between">
                        <button @click="previous" class="btn btn-primary btn-md" :disabled="page==1">Previous</button>
                        <button @click="next" class="btn btn-primary btn-md" :disabled="page>=totalPages">Next</button>
                    </div>
                </div>

			</div>
		</section>
	</layout>
</template>

<script>
	import Layout from '../layouts/MainLayout.vue';
	import DatePicker from 'vue2-datepicker'
	import moment from 'moment'

	export default {
		data() {
            return {
            	page: 1,
                totalPages: 1,
                audit_activity: [],
                loading: true,
                range: null,
                startDate: null,
                endDate: null,
            };
        },
		components: {
			Layout,
			DatePicker
		},
		watch: {
			range(newVal) {
				if(newVal) {
					this.parseRange();
				}
			},
		},
		created() {
			this.getRecords();
		},
		methods: {
			getRecords(page = 1) {
				this.loading = true;

				var range =  this.range ? '&start=' + this.startDate + '&end=' + this.endDate : '';

				return this.$http.get('/viewdit/api/all?page=' + page + range)
                    .then(response => {
                    	console.log(response);
                        this.audit_activity = response.data.audit_activity.data;
                        this.setPaginate(response.data.audit_activity);

                        this.loading = false;
                    });
			},
			setPaginate(result) {
				this.page 		= result.current_page;
				this.totalPages = result.last_page;
			},
			parseRange() {
				this.startDate 	=  moment.utc(this.range[0]).add(1,'days').startOf('day').format();
				this.endDate 	=  moment.utc(this.range[1]).add(1,'days').endOf('day').format();
	    	},
			previous() {
                this.getRecords(this.page - 1);
            },
            next() {
                this.getRecords(this.page + 1);
            }
		}
	}
</script>