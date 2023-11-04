import React, {PropsWithChildren} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";
import {ErrorBag, Errors, PageProps} from "@/types";

export default function Blog({}: PropsWithChildren) {
  const props: PageProps<any> & { errors: Errors & ErrorBag, post: {data: Post}, posts: {data: Post[]}} = usePage().props;
  const posts: Post[] = props.posts.data;
  return (
    <LandingLayout>
      <Head title="Welcome" />
      <Section>
        <div className={'mt-16 text-center text-7xl font-extrabold text-[#2273AF]'}>Blog</div>

        <PostGrid posts={posts} />

      </Section>
    </LandingLayout>
  );
}

const Section = ({children, className}: PropsWithChildren & {className?: string}) => {
  return (
    <div className={`min-h-screen h-full flex flex-col ${className}`}>
      <div className={'flex-1 py-24 mx-auto max-w-7xl w-full min-h-full'}>
        {children}
      </div>
    </div>
  );
}

type category = {title: string, href: string}
type author = {name: string, role: string, href: string, imageUrl: string}
type Post = {id: number, title: string, href: string, description: string, thumbnail: string, date: string, datetime: string, category: category, author: author}


const BlogPostCard = ({post}: PropsWithChildren & {className?: string, post: Post}) => {
  return (
    <article key={post.id} className="flex flex-col items-start justify-between">
      <div className="relative w-full">
        <img
          src={post.thumbnail}
          alt=""
          className="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]"
        />
        <div className="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" />
      </div>
      <div className="max-w-xl">
        <div className="mt-8 flex items-center gap-x-4 text-xs">
          <time dateTime={post.datetime} className="text-gray-500">
            {post.date}
          </time>
          <a
            href={post.category.href}
            className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
          >
            {post.category.title}
          </a>
        </div>
        <div className="group relative">
          <h3 className="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href={post.href}>
              <span className="absolute inset-0" />
              {post.title}
            </a>
          </h3>
          <p className="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{post.description}</p>
        </div>
      </div>
    </article>
  );
}

const PostGrid = ({posts}: PropsWithChildren & {className?: string, posts: Post[]}) => {
  return (
    <div className="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      {posts.map((post) => (
        <BlogPostCard key={post.id} post={post}/>
      ))}
    </div>
  );
}
