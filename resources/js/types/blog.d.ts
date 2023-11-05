type category = {title: string, href: string}
type author = {name: string, role: string, href: string, imageUrl: string}
type Post = {id: number, title: string, href: string, description: string, content: string | TrustedHTML, thumbnail: string, date: string, datetime: string, category: category, author: author}


export type {category, author, Post}
