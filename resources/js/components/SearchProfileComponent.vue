<template>
     <div class="col-md-4">
                        <div class="card border hover-shadow-6 mb-6 d-block" style="overflow: hidden;">
                              <div class="pt-5 text-center">
                                  <!-- <img class="avatar avatar-xl" src="{{ str_replace('_normal', '', @$profileData->profile_image_url) }}"  alt="Card image cap"> -->
                                  <img class="avatar avatar-xl" :src="avatar"  :alt="handle">

                                <h5 class="card-title mt-5">
                                <a :href="`/search/profile/${handle}`" v-show="screen_name">{{ screen_name }}</a><br/>
                                  <small>@{{ profileHandle }}</small></h5>
                              </div>
                                <div class="badges py-3 text-center">
                                    <a :class="`badge badge-${profile.category.color}`" :href="`/search/profiles/${profile.category.name}`">{{ profile.category.name }}</a>
                                    <!-- <a class="badge badge-primary" target="_blank" :href="`http://twitter.com/${profile.name}`" title="Platform">Twitter</a> -->
                                </div>
                                <h6 v-show="er !== null" class="text-center">ER: {{er}}%</h6>
                              <!-- <div class="p-1 text-center">
                                    <div class="container text-center">

                                        <div class="row" v-if="er.length > 0">
                                          <div class="col">
                                            <h6>{{ number(er.followers_count) }}</h6>
                                            <small><strong>Followers</strong> </small>
                                          </div>
                                          <div class="col">
                                            <h6>{{ number(er.friends_count) }}</h6>
                                            <small><strong>Following</strong> </small>
                                          </div>
                                          <div class="col" title="Engagement Rate">
                                            <h6>{{ er.er + '%' }}</h6>
                                            <small><strong>ER</strong></small>
                                          </div>
                                        </div>
                                  </div>
                              </div> -->
                                  <div class="text-center p-5">
                                    <a class="btn btn-warning" :href="`/search/profile/${profile.handle}`">View Stats</a>
                                  </div>

                        </div>

                        <!-- <div class="card border hover-shadow-6 mb-6 d-block">
                          <a href="#"><img class="card-img-top" src="./assets/img/thumb/1.jpg" alt="Card image cap"></a>
                          <div class="p-6 text-center">
                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">News</a></p>
                            <h5 class="mb-0"><a class="text-dark" href="#">We relocated our office to a new designed garage</a></h5>
                          </div>
                        </div> -->
                     </div>

</template>

<script>
export default {
    props: ['profileData'],
    data() {
        return {
            profile: this.profileData,
            loading: true,
            data: [],
            screen_name: '',
            avatar: '/static/assets/img/avatar/1.jpg',
            er: null,
            handle: '',
        }
    },
    created: function() {
     this.fetchProfile();
    },
    methods: {
        fetchProfile: function() {
          this.loading = true;

            fetch(`/api/v1/list/queryProfile?handle=${this.profileData.handle}`, {
                headers: {
                  Authorization: 'Bearer ' + $('meta[name="api-token"]').attr("content"),
                }
            })
              .then(res => res.json())
              .then((res) => {
                    this.loading = false;

                  if(res.status === 'success') {

                    const resData = res.data;
                    const profile = JSON.parse(resData.profile);
                    this.avatar = profile.profile_image_url.replace('_normal', '');
                    this.screen_name = resData.screen_name;
                    this.er = resData.er;
                  }
                })
                .catch((err) => {
                    console.log(err)
                    this.loading = false;
                })
        }
    },
    computed: {
      profileHandle: function() {
        return this.profileData.handle.replace(' ', '');
      }
    }
}
</script>
