// export type UserId = string; 
// export interface Users {
//     id: UserId,
//     firstName: string;
// }

export interface AuthState{
    // authenticatedUser:Users
    authenticatedUser:Object
    token:Object
    // users: Users[]
    users: Array<Object>
}
