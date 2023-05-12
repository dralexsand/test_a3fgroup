import router from "../../router"
import {compareOrder} from "./functions";

export const navItems = (position = 'top') => {
  
  let items = router.getRoutes()
    .filter(item => item.meta.position === position)
    .map(function (item) {
      return {
        name: item.name,
        path: item.path,
        order: item.meta.order,
        label: item.meta.label,
      }
    })
  
  return items.sort(compareOrder)
}