class Token{
    isValid(token){
        const payload = this.payloadFunction(token);
        if(payload){
            return payload.iss = "http://127.0.0.1:8000/api/auth/login" || "http://127.0.0.1:8000/api/auth/register" ? true : false
        }
        return false;
    }

    payloadFunction(token){
        const payload = token.split('.')[1]
        return this.decode(payload)
    }
    decode(payload){
        return JSON.parse(atob(payload))
    }
}
export default Token = new Token();

// class Token{
//     isValid(token){
//         const payload = this.payloadFunction(token);
//         if(payload){
//             return payload.iss = "http://127.0.0.1:8000/api/auth/login" || "http://127.0.0.1:8000/api/auth/register" ? true:false;
//         }else{
//             return false;
//         }
//     }
//
//     payloadFunction(token){
//         const payload = token.split('.')[1];
//         return this.decode(payload);
//     }
//     decode(payload){
//         return JSON.parse(atob(payload));
//     }
// }
// export default Token = new Token();
