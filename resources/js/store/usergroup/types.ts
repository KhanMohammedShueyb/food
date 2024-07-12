import { GroupResponse } from '../../entities/userGroups'

export interface UserGroupState {
    usergroups: GroupResponse[],
    groupPermissions: Array<Object>
  }