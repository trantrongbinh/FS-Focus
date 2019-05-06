<template>
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item" v-for="tab in tabs" :key="tab" @click="selected = tab;">
                <a :class="['nav-link', { active: selected === tab }]" data-toggle="tab" href="javascript:;">{{ tab }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <component :is="selected" class="tab"></component>
        </div>
    </div>
</template>
<script>
import Articles from "./particals/Article";
import Discussions from "./particals/Discussion";
import Following from "./particals/Following";
import Followers from "./particals/Follower";

export default {
    data: function() {
        return {
            tabs: ['Articles', 'Discussions', 'Following', 'Followers'],
            selected: "Articles"
        };
    },

    components: {
        Articles,
        Discussions,
        Following,
        Followers
    }
};

</script>
