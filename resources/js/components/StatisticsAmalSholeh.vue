<template>
    <tile :position="position" class="amal-sholeh-mode">
        <div class="grid gap-2 items-center w-full bg-tile z-10" style="grid-template-columns: auto 1fr">
            <div>
                <Avatar :src="avatar" />
            </div>
            <div class="leading-tight min-w-0">
                <h2 class="truncate capitalize">
                      <span class="text-xl">Amal Sholeh</span>
                </h2>
            </div>
        </div>
        <div class="grid gap-padding h-full markup">
                <ul class="align-self-center">
                <li>
                    <span>Jumlah Campaign</span>
<!--                    <span class="amal-sholeh-font">▲ 8</span>-->
                    <span class="font-bold variant-tabular">{{ formatNumber(jumlahCampaign) }}</span>
                </li>
                <li>
                    <span>Jumlah Donatur</span>
<!--                    <span class="amal-sholeh-font">▲ 8</span>-->
                    <span class="font-bold variant-tabular">{{ formatNumber(jumlahDonatur) }}</span>
                </li>
                <!-- <li>
                    <span>Jumlah Donatur</span> <span class="font-bold variant-tabular">{{ formatNumber(githubIssues) }}</span>
                </li>
                <li>
                    <span>Jumlah Campaign Selesai</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(githubPullRequests) }}</span>
                </li>
                <li>
                    <span>30 days</span>
                    <span class="font-bold variant-tabular">{{ formatNumber(packagistMonthly) }}</span>
                </li>
                <li>
                    <span>Total</span> <span class="font-bold variant-tabular">{{ formatNumber(packagistTotal) }}</span>
                </li> -->
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
        Tile,
        Avatar
    },

    mixins: [echo, saveState],

    props: ['position', 'avatar'],

    data() {
        return {
            // githubStars: 0,
            // githubIssues: 0,
            // githubPullRequests: 0,
            // githubContributors: 0,
            // packagistTotal: 0,
            // packagistMonthly: 0,
            jumlahCampaign : 0,
            jumlahDonatur : 0,
            // jumlahCampaignSelesai : 0,
            // total : 0,
        };
    },

    methods: {
        emoji,
        formatNumber,

        getEventHandlers() {
            return {
                'AmalSholeh.StatsFetched': response => {
                    this.jumlahCampaign = response.stats.total_campaign;
                    this.jumlahDonatur = response.stats.total_donatur;
                }
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
