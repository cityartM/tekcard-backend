import React, { PropsWithChildren } from 'react';
import Header from "./Header";
import Footer from './Footer';

export default function LandingLayout({ children }: PropsWithChildren) {
  return (
    <div className="">
      <Header />

      <main>
        {children}
      </main>

      <Footer />
    </div>
  );
}


