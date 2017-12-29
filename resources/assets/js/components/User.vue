<template>
    <div>
        <table width="98%" cellpadding="3" cellspacing="1" border="0">
            <tr>
                <td valign="top">
                    <router-link :to="{ name: 'user-profile', params: {pid: $route.params.pid } }">Profile</router-link>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link :to="{ name: 'user-settings', params: {pid: $route.params.pid } }">Settings</router-link>
                </td>
            </tr>
        </table>
    </div>
</template>