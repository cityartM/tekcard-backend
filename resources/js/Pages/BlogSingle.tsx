import React, {PropsWithChildren} from 'react';
import {Head, usePage} from '@inertiajs/react';
import LandingLayout from "../Layouts/LandingLayout";
import TextInput from "@/Components/Input";
import ApplicationLogo from "@/Components/ApplicationLogo";

/*const post: Post = {
  id: 1,
  title: 'Boost your conversion rate',
  href: '#',
  description: 'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
  content: '<p>Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>\r\n<p style="text-align: left;">&nbsp;<\/p>\r\n<p style="text-align: left;"><img src="https://images.unsplash.com/photo-1682687982470-8f1b0e79151a?auto=format&amp;fit=crop&amp;q=60&amp;w=800&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw2fHx8ZW58MHx8fHx8" alt="fsdfdsfs" width="772" height="162" /></p>',
  thumbnail: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
  date: 'Mar 16, 2020',
  datetime: '2020-03-16',
  category: { title: 'Marketing', href: '#' },
  author: {
    name: 'Michael Foster',
    role: 'Co-Founder / CTO',
    href: '#',
    imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  },
}*/

export default function BlogSingle({}: PropsWithChildren) {

  const post: Post = usePage().props.post.data as Post;
  const posts: Post[] = usePage().props.posts.data as Post[];

  console.log(post, posts)

  return (
    <LandingLayout>
      <Head title="Welcome" />
      {post && (
        <Section>
          <div className={'mt-16 text-center text-7xl font-extrabold text-[#2273AF]'}>{post.title}</div>
          <img src={post.thumbnail} alt="" className="mt-16 w-full rounded-xl bg-gray-50 object-cover" />

          <div className="relative w-full grid grid-cols-1 lg:grid-cols-7 gap-10">
            <div className={'mt-16 lg:mt-20 col-span-full lg:col-span-5 max-w-5xl'}>
              <BlogPostContent post={post} />
            </div>

            <div className={'mt-16 lg:mt-20 col-span-full lg:col-span-2 flex-shrink-0 max-w-xl'}>
              <div className={'mb-10 flex flex-col space-y-4'}>
                <TextInput
                  id={'search'}
                  type={'text'}
                  placeholder={'Search'}
                  value={''}
                  onChange={(event) => {}}
                />
                {/*{errors && <InputError message={errors}/>}*/}
              </div>
              <PostList posts={posts} />
            </div>
          </div>

        </Section>
      )}
    </LandingLayout>
  );
}

const posts: Post[] = [
  {
    id: 1,
    title: 'Boost your conversion rate',
    href: '#',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    content: '<p style="text-align: left;">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>\r\n<p style="text-align: left;">&nbsp;<\/p>\r\n<p style="text-align: left;"><img src="https://images.unsplash.com/photo-1682687982470-8f1b0e79151a?auto=format&amp;fit=crop&amp;q=60&amp;w=800&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw2fHx8ZW58MHx8fHx8" alt="fsdfdsfs" width="772" height="162" /></p>',
    thumbnail:
      'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    date: 'Mar 16, 2020',
    datetime: '2020-03-16',
    category: { title: 'Marketing', href: '#' },
    author: {
      name: 'Michael Foster',
      role: 'Co-Founder / CTO',
      href: '#',
      imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
  },
  {
    id: 2,
    title: 'Boost your conversion rate',
    href: '#',
    description: 'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    content: "",
    thumbnail: 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80',
    date: 'Mar 16, 2020',
    datetime: '2020-03-16',
    category: { title: 'Marketing', href: '#' },
    author: {
      name: 'Michael Foster',
      role: 'Co-Founder / CTO',
      href: '#',
      imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
  },
  {
    id: 3,
    title: 'Boost your conversion rate',
    href: '#',
    description: 'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    content: "",
    thumbnail: 'https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80',
    date: 'Mar 16, 2020',
    datetime: '2020-03-16',
    category: { title: 'Marketing', href: '#' },
    author: {
      name: 'Michael Foster',
      role: 'Co-Founder / CTO',
      href: '#',
      imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
  },
  // More posts...
]

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
type Post = {id: number, title: string, href: string, description: string, content: string | TrustedHTML, thumbnail: string, date: string, datetime: string, category: category, author: author}

const PostList = ({posts}: PropsWithChildren & {className?: string, posts: Post[]}) => {
  return (
    <div className="space-y-8 lg:space-y-10">
      {posts.map((post) => (
        <article key={post.id} className="relative isolate flex flex-col gap-8 lg:flex-row">
          <div className="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-24 lg:shrink-0">
            <img
              src={post.thumbnail}
              alt=""
              className="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover"
            />
            <div className="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" />
          </div>
          <div>
            <div className="flex items-center gap-x-4 text-xs">
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
            <div className="group relative max-w-xl">
              <h3 className="mt-2 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href={post.href}>
                  <span className="absolute inset-0" />
                  {post.title}
                </a>
              </h3>
              <p className="mt-3 text-sm leading-6 text-gray-600 line-clamp-1">{post.description}</p>
            </div>
          </div>
        </article>
      ))}
    </div>
  );
}

const BlogPostContent = ({post}: PropsWithChildren & {className?: string, post: Post}) => {
  return (
    <div className="relative w-full">
      <figure className="">
        <img
          className="aspect-video rounded-xl bg-gray-50 object-cover"
          src={post.thumbnail}
          alt=""
        />
      </figure>
      <div>
        <h1 className="mt-10 text-3xl font-bold tracking-tight text-[#2273AF] sm:text-4xl">{post.title}</h1>
        <div className="mt-10 flex justify-between items-center">
          <ApplicationLogo className="h-6 w-auto sm:h-8" />
          <div className="flex items-center gap-x-4 text-sm">
            <time dateTime={post.datetime} className="text-gray-500">
              {post.date}
            </time>
            <a
              href={"post.category.href"}
              className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
            >
              {"post.category.title"}
            </a>
          </div>
        </div>
      </div>
      <div className="mt-10 prose-lg prose-stone" dangerouslySetInnerHTML={{__html: post.content}} />
      <div>
        <div className="mt-10 flex justify-between items-center">
          <div className="text-3xl font-bold tracking-tight text-[#2273AF] sm:text-4xl">Share</div>
          <div className="flex items-center gap-x-4 text-sm">
            <div className={'flex items-center gap-6'}>
              <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.766 1.95073C16.9948 1.95426 18.1723 2.42555 19.0411 3.26167C19.91 4.09778 20.3998 5.23079 20.4035 6.41323V15.3373C20.3998 16.5197 19.91 17.6527 19.0411 18.4888C18.1723 19.325 16.9948 19.7962 15.766 19.7998H6.49213C5.26333 19.7962 4.08591 19.325 3.21701 18.4888C2.34812 17.6527 1.85835 16.5197 1.85468 15.3373V6.41323C1.85835 5.23079 2.34812 4.09778 3.21701 3.26167C4.08591 2.42555 5.26333 1.95426 6.49213 1.95073H15.766ZM15.766 0.166016H6.49213C2.92138 0.166016 0 2.97719 0 6.41323V15.3373C0 18.7733 2.92138 21.5845 6.49213 21.5845H15.766C19.3368 21.5845 22.2582 18.7733 22.2582 15.3373V6.41323C22.2582 2.97719 19.3368 0.166016 15.766 0.166016Z" fill="#2273AF"/><path d="M17.1571 6.41364C16.8819 6.41364 16.613 6.33513 16.3842 6.18803C16.1554 6.04094 15.9771 5.83187 15.8718 5.58726C15.7665 5.34266 15.739 5.0735 15.7927 4.81382C15.8464 4.55415 15.9788 4.31563 16.1734 4.12841C16.368 3.9412 16.6158 3.8137 16.8857 3.76205C17.1555 3.7104 17.4352 3.73691 17.6894 3.83823C17.9436 3.93955 18.1609 4.11113 18.3138 4.33127C18.4666 4.55141 18.5482 4.81022 18.5482 5.07498C18.5486 5.25088 18.5129 5.42513 18.4431 5.58771C18.3733 5.75029 18.2709 5.89802 18.1416 6.0224C18.0124 6.14678 17.8589 6.24537 17.6899 6.31251C17.5209 6.37965 17.3399 6.41402 17.1571 6.41364ZM11.129 7.30576C11.8627 7.30576 12.58 7.51513 13.1901 7.90739C13.8002 8.29966 14.2757 8.8572 14.5565 9.50952C14.8372 10.1618 14.9107 10.8796 14.7676 11.5721C14.6244 12.2646 14.2711 12.9007 13.7523 13.4C13.2334 13.8992 12.5724 14.2392 11.8528 14.377C11.1331 14.5147 10.3872 14.444 9.70929 14.1738C9.03141 13.9036 8.452 13.4461 8.04436 12.859C7.63672 12.2719 7.41914 11.5817 7.41914 10.8757C7.42019 9.92917 7.81138 9.02174 8.50689 8.35247C9.2024 7.68321 10.1454 7.30677 11.129 7.30576ZM11.129 5.52104C10.0284 5.52104 8.95259 5.83508 8.0375 6.42346C7.12242 7.01183 6.4092 7.84811 5.98803 8.82654C5.56686 9.80497 5.45667 10.8816 5.67138 11.9203C5.88609 12.959 6.41606 13.9131 7.19427 14.6619C7.97249 15.4108 8.96399 15.9208 10.0434 16.1274C11.1228 16.334 12.2417 16.228 13.2585 15.8227C14.2752 15.4174 15.1443 14.7311 15.7557 13.8505C16.3672 12.97 16.6935 11.9347 16.6935 10.8757C16.6935 9.45553 16.1073 8.09356 15.0637 7.08937C14.0202 6.08519 12.6048 5.52104 11.129 5.52104Z" fill="#2273AF"/></svg>
              <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.2583 10.9395C23.2583 4.99113 18.109 0.167969 11.7583 0.167969C5.40763 0.167969 0.258301 4.99113 0.258301 10.9395C0.258301 16.3157 4.46299 20.772 9.96143 21.5808V14.0542H7.04073V10.9395H9.96143V8.56643C9.96143 5.86729 11.6787 4.37513 14.3052 4.37513C15.5636 4.37513 16.8799 4.58576 16.8799 4.58576V7.23681H15.4291C14.0013 7.23681 13.5547 8.0668 13.5547 8.91987V10.9395H16.7439L16.2346 14.0542H13.5552V21.5818C19.0536 20.7734 23.2583 16.3172 23.2583 10.9395Z" fill="#2273AF" fillRule="evenodd" clipRule="evenodd"/></svg>
              <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.7294 2.3268C20.924 2.67651 20.0718 2.9069 19.1998 3.0107C20.1162 2.47448 20.8054 1.62259 21.138 0.614812C20.2716 1.12107 19.3253 1.47629 18.3396 1.66525C17.9246 1.23056 17.4254 0.884754 16.8724 0.648848C16.3194 0.412943 15.7242 0.291866 15.123 0.292976C12.6887 0.292976 10.7187 2.23293 10.7187 4.62435C10.717 4.95699 10.7551 5.28863 10.8323 5.61221C9.08679 5.53043 7.37753 5.08546 5.81393 4.30576C4.25032 3.52605 2.8668 2.42879 1.75188 1.08416C1.36074 1.74308 1.15388 2.49489 1.15293 3.26102C1.15293 4.76292 1.93707 6.09049 3.12111 6.86826C2.4196 6.85162 1.73246 6.66608 1.11804 6.3274V6.38103C1.11804 8.48191 2.6389 10.2297 4.65182 10.6275C4.27329 10.7283 3.88323 10.7794 3.49148 10.7795C3.21351 10.7799 2.93618 10.753 2.66351 10.699C3.2231 12.4199 4.85177 13.6715 6.78103 13.7073C5.21336 14.9146 3.28868 15.5671 1.30949 15.5623C0.958176 15.5618 0.60719 15.5409 0.258301 15.4997C2.27174 16.7845 4.6122 17.464 7.00111 17.4575C15.1136 17.4575 19.5456 10.8554 19.5456 5.12945C19.5456 4.94171 19.5407 4.75398 19.5317 4.57071C20.3919 3.95925 21.1361 3.19938 21.7294 2.3268Z" fill="#2273AF"/></svg>
              <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.7394 0H2.58746C1.5956 0 0.729004 0.71367 0.729004 1.69387V19.8861C0.729004 20.8717 1.5956 21.7499 2.58746 21.7499H20.7341C21.7313 21.7499 22.4789 20.8659 22.4789 19.8861V1.69387C22.4848 0.71367 21.7313 0 20.7394 0ZM7.471 18.1296H4.35513V8.44169H7.471V18.1296ZM6.02084 6.96872H5.99851C5.00131 6.96872 4.35561 6.2264 4.35561 5.29718C4.35561 4.35096 5.0183 3.62612 6.03783 3.62612C7.05736 3.62612 7.68121 4.34562 7.70355 5.29718C7.70306 6.2264 7.05736 6.96872 6.02084 6.96872ZM18.8586 18.1296H15.7428V12.8325C15.7428 11.5634 15.2893 10.6963 14.162 10.6963C13.3008 10.6963 12.791 11.2789 12.5643 11.8464C12.4793 12.0503 12.4565 12.328 12.4565 12.6116V18.1296H9.34062V8.44169H12.4565V9.7899C12.9099 9.1442 13.6183 8.21497 15.2665 8.21497C17.3119 8.21497 18.8591 9.56317 18.8591 12.4698L18.8586 18.1296Z" fill="#2273AF"/></svg>
              <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.3119 4.57022C26.3119 2.34372 24.6309 0.552625 22.5537 0.552625C19.74 0.424478 16.8705 0.375 13.938 0.375H13.0239C10.0985 0.375 7.22391 0.424478 4.41028 0.55312C2.33814 0.55312 0.65707 2.35411 0.65707 4.58062C0.5301 6.34153 0.476265 8.10294 0.479313 9.86435C0.474234 11.6258 0.531793 13.3888 0.651991 15.1535C0.651991 17.38 2.33306 19.186 4.4052 19.186C7.36104 19.3196 10.3931 19.3789 13.4759 19.374C16.5638 19.3839 19.5873 19.3212 22.5465 19.186C24.6238 19.186 26.3048 17.38 26.3048 15.1535C26.4267 13.3872 26.4826 11.6258 26.4775 9.8594C26.489 8.09799 26.4338 6.33493 26.3119 4.57022ZM10.9924 14.7181V4.99573L18.3566 9.85446L10.9924 14.7181Z" fill="#2273AF"/></svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
