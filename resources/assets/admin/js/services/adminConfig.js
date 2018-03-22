const location = windows.location;

export default {
    HOST: `${location.protocol}//${location.hostname}:${location.port}`,
    get API_URL() {//students,teacher
        return `${this.HOST}/admin/api`;
    },
    get ADMIN_URL() {//students da turma,teacher
        return `${this.HOST}/admin`;
    },
};