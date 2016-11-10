function logout() {
    var cfm = confirm("Do you want to logout now?");
    if(cfm)
        return true;
    else
        return false;
}