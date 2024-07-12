import { GroupPermission } from "@/entities/userGroupPermission";

export interface UserGroupPermissionState {
    permission: GroupPermission[],
    // usergroups:Array<Object>
  }