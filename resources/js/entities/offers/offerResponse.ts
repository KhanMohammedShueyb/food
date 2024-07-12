export type id          = Number
export type title       = String
export type image       = String
export type description = String
export type condition   = String
export type discount    = String

export interface Offers{
 id?        : id         
 title      : title      
 image      : image      
 description: description
 condition  : condition  
 discount   : discount   
}