import React from "react";
import ImageIphone16 from "../../../images/home/iphone16.webp";
import ImageIphone14 from "../../../images/home/iphone14.webp";

const __ = (key: string) => key;

const data = {
  title: __('Network smarter with free digital business cards.'),
  description: __('Stand out from the crowd with digital business cards. Not only are digital cards better for the environment, they’re also better for your wallet and will help you make a great first impression.'),
  link: {
    url: '#',
    text: __('Learn more about our digital business cards →'),
  },
  images: [
    ImageIphone16,
    ImageIphone14,
  ],
  stats: [
    {
      title: __('Downloaded'),
      value: '12.000 +',
    },
    {
      title: __('Transactions'),
      value: '$10 M',
    },
    {
      title: __('Feedback'),
      value: '1.000 +',
    },
  ],
}

const HeroStatsSection: React.FC = () => {
  return (
    <div className="min-h-full h-full p-4 grid grid-cols-1 lg:grid-cols-2 gap-10">
      <div className={'flex flex-col justify-center space-y-8'}>
        <h3 className={'text-[#2273AF] text-[3rem] font-extrabold'}>{data.title}</h3>
        <p className={'text-[#4E4E4E] text-[1.25rem] font-normal'}>{data.description}</p>
        <a href={data.link.url}
           className={'block text-[#44C8EF] text-[1.25rem] font-normal'}>
          {data.link.text}
        </a>
      </div>
      <div className={'hidden lg:block relative m-12 h-[50vh] bg-gradient-to-r from-sky-200 to-sky-100 rounded-2xl'}>
        <div className={'absolute inset-0 top-1/4 flex justify-center gap-12'}>
          {
            data.images.map((image, index) => (
              <img key={index} className={'h-[60vh] object-contain'} src={image} alt=""/>
            ))
          }
        </div>
      </div>
      <div className={'col-span-full'}>
        <div className="bg-white rounded-2xl shadow border">
          <div className="max-w-xl flex items-center flex-wrap divide-x">
            {
              data.stats.map((stat, index) => (
                <div key={index} className="px-10 py-4">
                  <div className="text-blue-500 text-3xl font-bold font-['Tajawal'] leading-10">{stat.value}</div>
                  <div className="text-neutral-600 text-xl font-normal font-['Tajawal'] capitalize leading-loose">{stat.title}</div>
                </div>
              ))
            }
          </div>
        </div>
      </div>
      <div className={'lg:hidden block relative p-12 bg-gradient-to-r from-sky-200 to-sky-100 rounded-2xl'}>
        <div className={'flex flex-col sm:flex-row justify-center gap-12'}>
          {
            data.images.map((image, index) => (
              <img key={index} className={'h-[60vh] object-contain'} src={image} alt=""/>
            ))
          }
        </div>
      </div>
    </div>
  );
}

export default HeroStatsSection;
