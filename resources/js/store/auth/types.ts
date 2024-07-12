export interface AuthState {
  api_access_token: string;
  username: string;
  email: string;
  password: string;
  user: object;
  all_users: Array<object>,
  authenticated_user: object,
  formState:number
}