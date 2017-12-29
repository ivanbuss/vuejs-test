<template>
    <div>
        <br />
        <span class="admin_head">
            DSS Letters
            -
            Patient <i v-if="patient">{{ patient.lastname }} {{ patient.middlename }} {{ patient.firstname }}</i>
        </span>
        <br />
        &nbsp;&nbsp;
        <router-link class="editlink" title="EDIT" :to="{ name: 'manage-patient', params: {pid: $route.params.pid } }"><b>&lt;&lt;Back</b></a></router-link>
        <br>
        <table width="98%" cellpadding="3" cellspacing="1" border="0">
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-appeal-letter-to-ins-com', params: {pid: $route.params.pid } }"><b>DSS Appeal letter to ins com</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-intro-to-md-from-dentist', params: {pid: $route.params.pid } }"><b>DSS intro to MD from dentist</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-intro-to-md-from-dss', params: {pid: $route.params.pid } }"><b>DSS intro to MD from DSS</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-progress-note-to-md-pt-non-compliant', params: {pid: $route.params.pid } }"><b>DSS progress note to MD pt non compliant</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-referral-thank-you-pt-scheduled', params: {pid: $route.params.pid } }"><b>DSS referral thank you - pt scheduled</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-referral-thank-you-pt-did-not-come-in', params: {pid: $route.params.pid } }"><b>DSS referral thank you pt did not come in</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-referral-thank-you-pt-not-candidate', params: {pid: $route.params.pid } }"><b>DSS referral thank you pt not candidate</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-referral-thank-you-pt-waiting-on', params: {pid: $route.params.pid } }"><b>DSS referral thank you pt waiting on</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-request-lomn-and-rx', params: {pid: $route.params.pid } }"><b>DSS request LOMN and Rx</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-soap-for-pt', params: {pid: $route.params.pid } }"><b>DSS SOAP for pt</b></router-link>-- PENDING
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-to-pt-no-treatment', params: {pid: $route.params.pid } }"><b>DSS to pt no treatment</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-to-pt-yearly-follow-up', params: {pid: $route.params.pid } }"><b>DSS to pt yearly follow up</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-fu-md-embletta-negative', params: {pid: $route.params.pid } }"><b>DSS FU MD embletta negative</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-fu-md-embletta-positive', params: {pid: $route.params.pid } }"><b>DSS FU MD embletta positive</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-fu-pt-embletta-negative', params: {pid: $route.params.pid } }"><b>DSS FU pt embletta negative</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'dss-fu-pt-embletta-positive', params: {pid: $route.params.pid } }"><b>DSS FU pt embletta positive</b></router-link>
                    <br /><br />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <router-link class="editlink" title="EDIT" :to="{ name: 'manage-recipients', params: {pid: $route.params.pid } }"><b>Recipients</b></router-link>
                    <br /><br />
                </td>
            </tr>
        </table>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                patient: []
            };
        },

        mounted: function () {
            this.getPatientData();
        },

        methods: {
            getPatientData: function () {
                let pid = this.$route.params.pid;
                axios.get('/api/patient/'+pid).then(response => {
                    this.patient = response.data.patient;
                    if (!this.patient) {
                        this.$router.push('/manage_patient');
                    }
                });
            },
        }
    }
</script>