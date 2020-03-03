<template>
    <tile :position="position">
        <div class="grid gap-padding h-full markup">
            <div class="grid gap-2 items-center w-full bg-tile z-10" style="grid-template-columns: auto 1fr">
                <div>
                    <avatar :src="avatar" />
                </div>
                <div class="leading-tight min-w-0">
                    <h2 class="truncate capitalize">
                        Moota
                    </h2>
                </div>
            </div>
            <ul class="align-self-center">
                <li>
                    <span>Nama Aplikasi</span>
                </li>
                <li>
                    <span v-html="emoji('✨')" />
                    <span class="font-bold variant-tabular">{{ formatNumber(githubStars) }}</span>
                </li>
                <li>
                    <span>Contributors</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(githubContributors) }}</span>
                </li>
                <li>
                    <span>Issues</span> <span class="font-bold variant-tabular">{{ formatNumber(githubIssues) }}</span>
                </li>
                <li>
                    <span>Pull Requests</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(githubPullRequests) }}</span>
                </li>
                <li>
                    <span>30 days</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(packagistMonthly) }}</span>
                </li>
                <li>
                    <span>Total</span> <span class="font-bold variant-tabular">{{ formatNumber(packagistTotal) }}</span>
                </li>
            </ul>
        </div>
    </tile>
</template>

<script>
import { emoji, formatNumber } from '../helpers';
import echo from '../mixins/echo';
import Avatar from './atoms/Avatar';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';

export default {
    components: {
        Avatar,
        Tile,
    },

    mixins: [echo, saveState],

    props: ['position', 'avatar'],

    data() {
        return {
            githubStars: 0,
            githubIssues: 0,
            githubPullRequests: 0,
            githubContributors: 0,
            packagistTotal: 0,
            packagistMonthly: 0,
        };
    },

    methods: {
        emoji,
        formatNumber,

        getEventHandlers() {

            return {
                'Moota.StatsFetched': response => {
                    this.githubStars = response.stats.total_user;
                    this.githubIssues = response.stats.user_this_month;
                    this.githubPullRequests = response.stats.user_active;
                    this.githubContributors = response.stats.total_bank_account;
                    this.packagistTotal = response.stats.bank_account_this_month;
                    this.packagistMonthly = response.stats.total_account_deleted;
                },
                // 'Statistics.PackagistTotalsFetched': response => {
                //
                // },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'statistics',
            };
        },
    },
};
</script>
