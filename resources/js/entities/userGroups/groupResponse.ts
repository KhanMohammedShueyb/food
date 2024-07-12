import { Permission } from "../userGroupPermission"

export type GroupId = Number

export interface GroupResponse {
  id?  : GroupId
  name : string
  model: Permission
}