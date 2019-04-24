<template>
    <li class="nav-item notification dropdown">
        <a id="notifications" class="nav-link logout" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="getNotification">
            <i class="fa fa-bell"></i>
            <span class="new" v-if="unreadNotification > 0 && isMarking == false">
                <span class="noti-numb-bg"></span><span class="badge text-danger"><i class="fas fa-circle"></i></span>
            </span>
        </a>
        <ul aria-labelledby="notifications" class="dropdown-menu notifications">
            <li style="width: 100%; padding: 0.5rem 1rem; display: inline-flex !important; border-bottom: 0.01rem solid #eee;">
                <div class="heading-left" style="width: 70%; text-align: left;">
                    <h6 class="heading-title" style="color: #555;margin: 0;line-height: 20px;font-size: 14px;">Notifications</h6>
                </div>
                <div class="heading-right" style="width: 30%; text-align: right; color: #4aaee7; font-weight: 700;font-size: 11px;">
                    <a class="notification-link" href="#" @click="markRead">Mark As Read</a>
                </div>
            </li>
            <li>
                <ul class="notification--list" style="padding: 0.5rem 1rem;margin: 0 0 0.5rem;">
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                    <li class="notification-item" style="display: flex;">
                        <div class="img-left" style="width: 15%;">
                            <img alt="User Photo" src="https://randomuser.me/api/portraits/thumb/women/65.jpg" class="user-photo" style="display: inline-block;vertical-align: middle;height: 40px;width: 40px;margin: 0 0.5rem 0 0;border-radius: 50%;max-width: 100%;">
                        </div> 
                        <div class="user-content" style="width: 85%;">
                            <p class="user-info" style="margin: 0.15rem 5px 0px;">
                                <span class="name" style="font-weight: 700; font-size: 14px; color: #000">trantrongbinh</span> commented Discussions <a href="#"> json_decode() expects parameter 1 to be string, array given TTB?</a>
                            </p> 
                            <p class="time">1 hour ago</p>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</template>
<script>
export default {
    props: {
        unreadNotification: {
            type: String,
            default () {
                return 0
            }
        },
    },

    data() {
        return {
            notifications: [],
            isMarking: false,
        }
    },

    methods: {
        getNotification() {
            var url = 'user/notification'
            this.$http.get(url).then((response) => {
                response.data.data.forEach((data) => {
                    data.notification_action = this.parse(data.content_html)

                    return data
                })

                this.notifications = response.data.data
            })
        },

        markRead() {
            this.isMarking = true;
        }
    }
}

</script>
<style lang="scss" scoped>

</style>
