import { Permission } from "@/entities/userGroupPermission";
export interface RootState {
  message    : string;
  permissions: Permission
}
