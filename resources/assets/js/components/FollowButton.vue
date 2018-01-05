<template>
    <div>
        <span v-if="!isFollowing">
            <a class="btn btn-primary btn-block" @click="toggleFollow()">
                <i class="fa fa-bell"></i> Follow
            </a>
        </span>
        <span v-else>
            <a class="btn btn-danger btn-block" @click="toggleFollow()">
                <i class="fa fa-bell-o"></i> Following
            </a>
        </span>
    </div>    
</template>

<script>
export default {
    props: ['id', 'type'],
    data() {
        return {
            isFollowing: this.userIsFollowing()
        }
    },
    methods: {
        toggleFollow() {
            axios.get('/api/toggleFollow?id=' + this.id + '&type=' + this.type)
                .then(({data}) => {
                    this.isFollowing = !this.isFollowing
                });
        },
        userIsFollowing() {
            axios.get('/api/following?id=' + this.id + '&type=' + this.type)
                .then(({data}) => {
                    if (data == 1) {
                        this.isFollowing = true;
                    } else {
                        this.isFollowing = false;
                    }
                });
        }
    }
}
</script>
