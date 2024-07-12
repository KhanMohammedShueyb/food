export type user_group    = Boolean
export type id            = Number
export type user_group_id = Boolean
export type category      = Boolean
export type user          = Boolean

export interface GroupPermission{
  id?          : id
  user         : user
  user_group   : user_group
  user_group_id: user_group_id
  category     : category
}