<template>
    <div class="container-fluid">
        <div class="row border border-dark mr-1 p-1 bg-info min-vh-70">
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12  bg-light-light-blue">
                <div class="row pb-2 pt-2">
                    <div
                        class="list-group w-100 list-group-flush pl-1 position-relative rounded-left"
                        id="list-tab"
                        role="tablist"
                        style="left:1px">
                        <a v-for="(tab, key) in tabs" :key="tab.name"
                           :href="tab.slug"
                           class="list-group-item list-group-item-transparent text-capitalize border border-dark border-right-0"
                           :class="{
                               'active' : tab.slug === activeTab,
                               'border-bottom-0' : key !== (tabs.length-1)
                           }"
                           v-on:click="activeTab = tab.slug"
                        > {{ tab.name }}</a>

                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm col p-1 pl-3 bg-white border-dark border shadow">
                <div class="row no-gutters">
                    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 col-12 mb-1 p-2">
                        <div class="tab-content" id="nav-tabContent">
                            <div
                                v-show="activeTab === '#tab-home'"
                                role="tabpanel"
                                aria-labelledby="list-home-list">
                                <span class="row h4 no-gutters border-bottom">Основные настройки</span>
                                <div class="alert alert-danger" v-if="_.isEmpty(this.errors)">
                                    <ul>
                                        <li v-for="(error, key) in this.errors" :key="key">
                                        {{ error }}</li>

                                    </ul>
                                </div><br/>
                                <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                    <label class="col-6 border-right mr-2 pl-3" for="name">Имя</label>
                                    <input type="text" class="form-control col" name="name" v-model="user.name"/>
                                </div>
                                <div class="row">
                                    <span class="col-8 h5 no-gutters border-bottom mt-4">Настройки пароля</span>
                                    <div class="form-group row col-8  border-bottom no-gutters pb-2">
                                        <label class="col-6  border-right mr-2 pt-1 pl-3" for="new_pass">Новый
                                            пароль</label>
                                        <input type="password" class="form-control col" name="new_pass"
                                               v-model="user.new_pass"/>
                                    </div>
                                    <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                        <label class="col-6  border-right mr-2 pl-3 pt-1" for="new_pass_retry">Повторить
                                            новый пароль</label>
                                        <input type="password" class="form-control col" name="new_pass_retry"
                                               v-model="user.new_pass_retry"/>
                                    </div>
                                    <div class="form-group row col-8 border-bottom no-gutters pb-2">
                                        <label class="col-6 border-right mr-2 pl-3 pt-1" for="old_pass">Старый
                                            пароль</label>
                                        <input type="password" class="form-control col" name="old_pass"
                                               v-model="user.old_pass"/>
                                    </div>
                                    <span class="w-100"></span>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
                                        <button type="submit" class="btn btn-block btn-primary"
                                                @click="updateNameAndPass()">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                role="tabpanel"
                                v-show="activeTab === '#tab-profile'"
                                aria-labelledby="list-profile-list">
                                <span class="row h4 no-gutters border-bottom">Настройки профиля</span>
                                <div class="row no-gutters p-3 border-bottom mb-3">
                                    <div class="text-left pl-2 pb-2 col-lg-2 col-6">
                                        <img
                                            class="rounded-lg border border-dark shadow mb-1 bg-white row"
                                            style="padding: 1px" :src="user.avatar" :alt="user.name">
                                    </div>
                                    <div class="row col-10 no-gutters">
                                        <span class="col-6 h5">Аватар</span>
                                        <div class="form-group custom-file col-7 mb-2">
                                            <input type="file" class="custom-file-input " name="avatar">
                                            <label class="custom-file-label" for="avatar">Выбрать файл для
                                                аватара</label>
                                        </div>
                                        <span class="col-6 h5 ">Пол</span>
                                        <div class="form-group col-7">
                                            <select class="form-control  col-7" name="sex">
                                                <option :selected="user.sex === 'unset'" value="unset">Не задан</option>
                                                <option :selected="user.sex === 'male'" value="male">Мужской</option>
                                                <option :selected="user.sex === 'female'" value="female">Женский
                                                </option>
                                            </select>
                                        </div>
                                        <span class="w-100"></span>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-0">
                                            <button type="submit" class="btn btn-block btn-primary">Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div
                                role="tabpanel"
                                aria-labelledby="list-messages-list"
                                v-show="activeTab === '#tab-social'">
                                <span class="row h4 no-gutters border-bottom">Настройки социальных сетей</span>
                                <div class="form-group row no-gutters pb-2">
                                    <div class="col-12 border-bottom mb-3 p-3 row">
                                        <div v-for="(badge, key1) in user.badges" :key="badge.id"
                                             class="row col-xl-2  col-lg-1 col-sm-6 col-md-3 col-4">
                                            <a :href="badge.link" @click.prevent class=""> <span class="social-badge"
                                                                                                 v-html="badge.social_badge.icon"></span></a>

                                            <button class="btn btn-success fas fa-wrench fa-sm mr-1"
                                                    @click="selectBadgeForEdit(badge)"></button>
                                            <button class="btn btn-danger fas fa-times fa-sm"
                                                    @click="selectBadgeForDelete(badge)"></button>
                                        </div>
                                        <button class="btn btn-primary fas fa-plus fa-sm"
                                                @click="selectBadgeForAdd()"></button>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-12 mb-3 p-3" v-show="showAdd">
                                        <span
                                            class="row h5 no-gutters border-bottom">Добавить привязку социальных сетей</span>
                                        <div class="form-group">
                                            <label for="social">Социальная сеть</label>
                                            <input type="text" class="form-control" name="social"
                                                   v-model="selectedBadgeForAdd.social_badge.name"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="link">Ссылка</label>
                                            <input type="text" class="form-control" name="link"/>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary"
                                                @click="showAdd == false">Добавить
                                        </button>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-12 mb-3 p-3" v-show="showEdit">
                                        <span
                                            class="row h5 no-gutters border-bottom">Изменить привязку социальных сетей</span>
                                        <div class="form-group">
                                            <label for="social">Соуиальная сеть</label>
                                            <input type="text" class="form-control" name="social"
                                                   v-if="selectedBadgeForEdit.social_badge"
                                                   v-model="selectedBadgeForEdit.social_badge.name"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="link">Ссылка</label>
                                            <input type="text" class="form-control" name="link"
                                                   v-model="selectedBadgeForEdit.link"/>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary" @click="showEdit=false">
                                            Изменить
                                        </button>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-12 mb-3 p-3" v-show="showDelete">
                                        <span
                                            class="row h5 no-gutters border-bottom">Подтвердите удаление привязки</span>
                                        <button type="submit" class="btn btn-block btn-danger"
                                                @click="showDelete=false">Удалить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 border">
                        <div class="" v-if='refresh'>
                            <div class="text-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash'
Vue.prototype._ = _;
export default {
    name: "ProfileEdit",
    props: {
        tabs: {type: Array, required: true},
        fetchUrl: {type: String, required: true},
        updateNameAndPassUrl: {type: String, required: true},
    },
    data() {
        return {
            url: '',
            activeTab: window.location.hash || this.tabs[0].slug,
            user: {},
            refresh: false,
            showAdd: false,
            showEdit: false,
            showDelete: false,
            selectedBadgeForEdit: {},
            selectedBadgeForDelete: {},
            selectedBadgeForAdd: {
                social_badge: {}
            },
            errors:{},
        }
    },
    watch: {
        fetchUrl: {
            handler: function (fetchUrl) {
                this.url = fetchUrl
            },
            immediate: true
        },
    },
    created() {
        console.log('created');
        return this.fetchData()
    },
    methods: {
        fetchData() {
            var params = {
                page: this.currentPage,
                column: this.sortedColumn,
                order: this.order,
                per_page: this.per_page,
            };
            params = Object.assign(params, this.filter);
            this.refresh = true;
            axios.get(this.url, {params: params}).then(({data}) => {
                this.user = data.data
                this.refresh = false;
            }).catch(error => this.tableData = [])
        },
        selectBadgeForDelete(badge) {
            this.selectedBadgeForDelete = badge;
            this.selectedBadgeForEdit = {};
            this.showDelete = true;
            this.showAdd = false;
            this.showEdit = false;
        },
        selectBadgeForEdit(badge) {
            this.selectedBadgeForDelete = {};
            this.selectedBadgeForEdit = badge;
            this.showDelete = false;
            this.showAdd = false;
            this.showEdit = true;
        },
        selectBadgeForAdd() {
            this.showDelete = false;
            this.showAdd = true;
            this.showEdit = false;
        },
        updateNameAndPass() {
            var params = {
                name: this.user.name,
                old_pass: this.user.old_pass,
                new_pass: this.user.new_pass,
                new_pass_retry: this.user.new_pass_retry,
            };
            this.refresh = true;
            axios.post(this.updateNameAndPassUrl, params)
                .then(({data}) => {
                    this.refresh = false;
                    console.log(data);
                }).catch(error => {
                this.errors = error.response ? error.response.data.errors : {};
                this.refresh = false;
            })
        }
    }
}
</script>

<style scoped>

</style>
